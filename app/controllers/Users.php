<?php
class Users extends Controller
{

    private $db, $search;

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->dialog = $this->dialog('Dialog');
    }

    public function getIP()
    {

        // Declaring a variable to hold the IP
        // address getHostName() gets the name
        // of the local machine getHostByName()
        // gets the corresponding IP

        $localIP = getHostByNamel(getHostName());

        // Displaying the address 
        return $localIP[1];
    }

    // verify user login to the system
    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            $data = [
                'username' => trim(SANITIZE_INPUT_STRING($_POST['username'])),
                'password' => trim(SANITIZE_INPUT_STRING($_POST['password']))
            ];

            $loggedInUser = $this->userModel->login($data['username'], $data['password']);

            if ($loggedInUser) {
                // Create Session
                $this->createUserSession($loggedInUser);
            } else {
                echo '<script>alert("Invalid username/password, Please try again.")</script>';
                $this->view('users/login', $data);
            }
        } else {
            // reset data
            $data = [
                'username' => '',
                'password' => ''
            ];

            // Load form
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['username'] = $user['username'];
        redirect('homepage/dashboard');
    }

    public function logout()
    {
        unset($_SESSION['username']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }

    // Create user account (Create Account Module)
    public function create($DB)
    {
        $_SESSION['CreateUserDB'] = $DB;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'fname' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['first-name'])),
                'mname' => trim(SANITIZE_INPUT_STRING($_POST['middle-name'])),
                'lname' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['last-name'])),
                'ID' => trim(SANITIZE_INPUT_STRING($_POST['Id'])),
                'app' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['application'])),
                'ip' => $this->getIP(),
                'requestor' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['requestor'])),
                'remarks' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['remarks'])),
            ];

            $username = $this->generateUsername($data['fname'], $data['mname'], $data['lname'], $data['ID']);
            $password = $this->generatePassword();

            $data += [
                'username' => $username,
                'password' => $password,
                'db_name' => $DB
            ];

            try{

            if ($DB == 'RMSPRD') {

                $resultUsername = $this->userModel->getUsername($username, $DB);
                $resultCreatedUser = $this->userModel->createUser($username, $password, $DB);
                $resultAttribTable = $this->userModel->insertToUserAttrib($username, $DB);
                $resultAccountsTable = $this->userModel->insertToUserAccounts($data, $DB);
                $resultSecUserGroup = $this->userModel->insertToSecUserGroup($username, $DB);
                $resultGrantUser = $this->userModel->grantUserRole($username, $password, $DB);
                
                if($data['app'] == 'OREIM'){
                    $this->userModel->insertIntoBusinessRoleMember($username, $DB);
                    $this->userModel->insertIntoIMUserAuth($data, $DB);
                }

                if ($resultCreatedUser && $resultAttribTable && $resultAccountsTable && $resultSecUserGroup && $resultGrantUser){

                    if($resultUsername){

                        $msg = strtoupper($data['ID'].' '.$data['fname'].' '.$data['mname'].' '.$data['lname']).'<br>Username: '.$username.'<br>Password: '.$password;

                        $this->dialog->SUCCESS('Update User', $DB.' User updated successfully', $msg, '/users/show/default');

                    }
                    else
                    {
                    //Generate LDIF File after user is created.
                    $ldiffile = $this->generateLDIF($data['fname'], $data['lname'], $data['ID'], $username, $password);

                    //Shows the viewer of file contents.
                    $this->view('users/ldif', $data += ['ldif' => $ldiffile]);
                    }
                }

            } else {

                $resultUsername = $this->userModel->getUsername($username, $DB);

                if($resultUsername){

                    $resultCreatedUser = $this->userModel->createUser($username, $password, $DB);
                    $resultGrantUser = $this->userModel->grantUserRole($username, $password, $DB);

                    $msg = strtoupper($data['ID'].' '.$data['fname'].' '.$data['mname'].' '.$data['lname']).'<br>Username: '.$username.'<br>Password: '.$password;
                    $this->dialog->SUCCESS('Update User', $DB.' User has been updated successfully', $msg, '/users/create/RDWPRD');

                }else{

                    $resultCreatedUser = $this->userModel->createUser($username, $password, $DB);
                    $resultGrantUser = $this->userModel->grantUserRole($username, $password, $DB);

                    if($resultCreatedUser && $resultGrantUser){

                        $msg = strtoupper($data['ID'].' '.$data['fname'].' '.$data['mname'].' '.$data['lname']).'<br>Username: '.$username.'<br>Password: '.$password;
                        $this->dialog->SUCCESS('Create User', $DB.' User created successfully', $msg, '/users/create/RDWPRD');

                    }else{
                        $this->dialog->FAILED('Create User', $DB.'User creation failed', 'Unable to create user.', '/users/show/default');
                    }

                }
                
            }

            $this->userModel->insertToUserMaster($data, 'RMSPRD');

            $data=[];

        }
        catch(\Exception $e)
        {
            $this->dialog->FAILED('Create User', 'User creation failed', $e->getMessage(), '/users/show/default');
        }

        } else {
            $this->view('users/create', []);
        }
    }
    // gets list of users
    public function show($DB)
    {
        $data = ['search' => isset($_SESSION['Search'])?$_SESSION['Search']:''];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['search' => trim(SANITIZE_INPUT_STRING(empty($_POST['searchuser']) ? '' : $_POST['searchuser']))];
        }
        $_SESSION['Search'] = $data['search'];
        $_SESSION['UserDB'] = $DB;

        if (isset($_SESSION['UserDB'])) {
            $this->db = $_SESSION['UserDB'];
        }

        if (isset($_SESSION['Search']) && $_SESSION['Search'] != null || $_SESSION['Search'] != '') {
            $this->search = $_SESSION['Search'];
        }

        if ($result = $this->userModel->getUserList($this->search, $this->db)) {
            $data = $result;
        } else {
            $data = [];
        }

        $this->view('users/show', $data);
    }

    public function generateUsername($fname, $mname, $lname, $ID)
    {
        $username = substr($fname, 0, 1) . ($mname == null ? "" : substr($mname, 0, 1)) . preg_replace('/\s+/', '', $lname) . $ID;
        return strtoupper($username);
    }

    public function generatePassword()
    {
        $password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3) . rand(10000, 99999);
        return $password;
    }

    // Generate LDIF file function
    public function generateLDIF($fname, $lname, $ID, $username, $password)
    {
        $givenName = strtoupper($fname);
        $surName = strtoupper($lname);
        $cn = $username;
        $uid = $username;
        $mail = $username . "@kccmalls.com";
        $employeeNum = $ID;
        $LDIF = "dn: cn=$username,cn=Users,dc=kccmalls,dc=com\nobjectclass: top\nobjectclass: organizationalperson\nobjectclass: person\nobjectclass: inetorgperson\nobjectclass: KCCOBJ\nobjectclass: rsimUser\ngivenname: $givenName\nsn: $surName\ncn: $cn\nuid: $uid\nemployeenumber: $employeeNum\nmail: $mail\ndescription: Department Store\ndisplayname: $cn\npreferredlanguage: en\nuserstore: rsimStoreId=2,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=1,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=3,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=4,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=5,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=6,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=7,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=8,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=9,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=41,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=42,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=43,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=45,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=46,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=44,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=47,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=48,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=49,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nemploymentstatus: 0\nssn: 123456789\npreferredcountry: US\nuserrole: rsimRoleName=KCC Admin,cn=rsimRoles,cn=RSIM,dc=kccmalls,dc=com\nhomestore: rsimStoreId=2,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserpassword: $password";

        $file = fopen("$username.ldif", "w") or die("Unable to open file!");
        fwrite($file, $LDIF);
        fclose($file);
        return $username . '.ldif';
        exit();
    }

    public function delete($username)
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $db = trim(SANITIZE_INPUT_STRING($_POST['delete_db']));

            try{

                $db = trim(SANITIZE_INPUT_STRING($_POST['delete_db']));

                $resultDeactivate = $this->userModel->deactivateUser($username, $db);

                if($resultDeactivate){

                    $this->dialog->SUCCESS('Delete User', ' User deletion/deactivation successful', $username.' has been deleted/deactivated.', '/users/show/default');
                }
                else{
                    $this->dialog->FAILED('Delete User', 'User deletion/deactivation failed', 'Unable to delete/deactivate '.$username, '/users/show/default');
                }

            }
            catch(\Exception $e)
            {
                $this->dialog->FAILED('Delete User', 'User deletion/deactivation failed', $e->getMessage(), '/users/show/default');
            }

            
        }
    }

    public function edit($id)
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $db = trim(SANITIZE_INPUT_STRING($_POST['edit_db']));

            //get specific details and pass to view
            $result = $this->userModel->getUserDetails($id);

            $data = $result;

            $_SESSION['CreateUserDB'] = $db;

            $this->view('users/create', $data);
        }
    }

    public function download_ldif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file = [
                'ldif' => trim($_POST['ldiffile'])
            ];

            if (file_exists($file['ldif'])) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($file['ldif']));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file['ldif']));
                ob_clean();
                flush();
                readfile($file['ldif']);
                exit();
                $this->view('users/create', $data = []);
            }
        }
    }

}
