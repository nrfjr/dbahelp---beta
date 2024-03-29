<?php

/***
 * 
 *      Users Controller
 *      Created: December 15, 2022 (Not Exact)
 *      Created By: Nurfajar S. Sali
 * 
 *      This class contains methods that fetch data from
 *      Model class, these methods are also responsible on
 *      passing data to view, as these methods passes which
 *      views are appropriate for certain method calls along
 *      with necessary data.
 * 
 *      We made sure that methods are name after its purpose.
 *      So it is undestandable what are their process is all
 *      about.
 * 
 *      Comments are quite annoying if put in every line,
 *      whereas comments should be solid and intact but 
 *      informative as this for example.
 * 
 *      if there are confusing lines in the code below, you
 *      can email me at Gmail: nurfajarsali@gmail.com
 * 
 */

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

        // Declare a variable to hold the IP address
        $IP = '';

         if(!empty($_SERVER['REMOTE_ADDR'])) {  
                 $IP = $_SERVER['REMOTE_ADDR'];  
        }  
        else{  
                 $IP = $_SERVER['HTTP_CLIENT_IP'] ;  
         }  

        // Return the IP address
        return $IP;
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

            if ($data['username'] == ORACLE_ADMIN_USERNAME && $data['password'] == ORACLE_ADMIN_PASSWORD) {
                $data += ['firstname' => 'Admin'];
                $this->createUserSession($data);
            } elseif ($loggedInUser[0]) {

                $this->createUserSession($loggedInUser[1]);
            } else {
                echo '<script>alert("' . $loggedInUser[1] . '")</script>';
                $this->view('oracle/users/login', $data);
            }
        } else {
            // reset data
            $data = [
                'username' => '',
                'password' => ''
            ];

            // Load form
            $this->view('oracle/users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['username'] = $user['username'];
        $_SESSION['firstname'] = $user['firstname'];
        redirect('homepage/dashboard');
    }

    public function logout()
    {
        try {
            unset($_SESSION['username'], $_SESSION['firstname']);
            session_destroy();
            redirect('users/login');
        } catch (\Exception | \Error | \Throwable | \TypeError $e) {
        }
    }

    // Create user account (Create Account Module)
    public function create($DB)
    {
        $_SESSION['CreateUserDB'] = $DB;

        try {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = [
                    'fname' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['first-name'])),
                    'mname' => trim(SANITIZE_INPUT_STRING($_POST['middle-name'])),
                    'lname' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['last-name'])),
                    'ID' => trim(SANITIZE_INPUT_STRING($_POST['Id'])),
                    'app' => trim($_POST['application']),
                    'ip' => $this->getIP(),
                    'requestor' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['requestor'])),
                    'remarks' => trim(SANITIZE_INPUT_STRING_EXCEPT_SPACE($_POST['remarks'])),
                    'access' => trim(SANITIZE_INPUT_STRING($_POST['access'])),
                ];

                if (!empty($data['fname']) && !empty($data['lname']) && !empty($data['ID']) && !empty($data['requestor']) && !empty($data['remarks'])) {

                    $username = $this->generateUsername($data['fname'], $data['mname'], $data['lname'], $data['ID']);
                    $ExistingPasswordByUsername = ($this->userModel->getUsername($username, 'get_Username', ORACLE_DBS['DEFAULT'][1])) ? $this->userModel->getUsername($username, 'get_Username', ORACLE_DBS['DEFAULT'][1])['PASSWORD'] : null;
                    $password = ($ExistingPasswordByUsername == null) ?  $this->generatePassword() : $ExistingPasswordByUsername;

                    $data += [
                        'username' => $username,
                        'password' => $password,
                        'db_name' => $DB
                    ];

                    $this->passUserDetailsToModel($data, $DB);

                    if (in_array($DB, USER_MASTER)) {
                        $this->userModel->insertToUserMaster($data, 'DEFAULT');
                    }

                    $data = [];
                } else {
                    $this->dialog->FAILED('Create User', 'User creation failed', 'Invalid / Missing Input, Please try again!', '/users/show');
                }
            } else {

                $this->view('oracle/users/create', []);
            }
        } catch (\Exception $e) {
            $this->dialog->FAILED('Create User', 'User creation failed', $e->getMessage(), '/users/show');
        }
    }


    //  This method passes details to our User Model
    //  for Database Operations

    public function passUserDetailsToModel($data, $DB)
    {
        $resultUsername = $this->userModel->getUsername($data['username'], 'get_Username', $DB);

        if ($DB == ORACLE_DBS['DEFAULT'][1]) {

            $resultCreatedUser = $this->userModel->createUser($data['username'], $data['password'], $DB);
            $resultAttribTable = $this->userModel->insertToUserAttrib($data['username'], $DB);
            $resultAccountsTable = $this->userModel->insertToUserAccounts($data, $DB);
            $resultSecUserGroup = $this->userModel->insertToSecUserGroup($data['username'], $DB);
            $resultGrantUser = $this->userModel->grantUserRole($data['username'], $data['password'], $DB);

            if ($data['app'] == 'OREIM') {

                $this->userModel->insertIntoBusinessRoleMember($data['username'], $DB);
                $this->userModel->insertIntoIMUserAuth($data, $DB);
            }

            if ($data['access'] != null) {
                $resultSameAccess = $this->userModel->grantSameAccess($data['access'], $data['username'], $DB);
            } else {
                $resultSameAccess = null;
            }

            if ($resultCreatedUser && $resultAttribTable && $resultAccountsTable && $resultSecUserGroup && $resultGrantUser) {

                //if all the model operation is successful,
                //it will proceed on displaying the result of
                //user creation.

                $this->printCreatedRetailUser($data, $DB, $resultSameAccess);
            } else {
                $this->dialog->FAILED('Create User', $DB . 'User creation failed', 'Unable to create user.', '/users/show');
            }
        } else {

            $resultCreatedUser = $this->userModel->createUser($data['username'], $data['password'], $DB);
            $resultGrantUser = $this->userModel->grantUserRole($data['username'], $data['password'], $DB);

            if ($resultCreatedUser && $resultGrantUser) {

                $this->printCreatedOtherDBUser($data, $DB, $resultUsername);
            } else {
                $this->dialog->FAILED('Create User', $DB . 'User creation failed', 'Unable to create user.', '/users/show');
            }
        }
    }

    // This method is responsible for printing output
    // from database operation of RDW users.

    public function printCreatedOtherDBUser($data, $DB, $isExist)
    {
        if ($isExist) {

            $msg = strtoupper($data['ID'] . ' ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname']) . '<br>Username: ' . $data['username'] . '<br>Password: ' . $data['password'];
            $this->dialog->SUCCESS('Update User', $DB . ' User has been updated successfully', $msg, '/users/show');
        } else {

            $msg = strtoupper($data['ID'] . ' ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname']) . '<br>Username: ' . $data['username'] . '<br>Password: ' . $data['password'];
            $this->dialog->SUCCESS('Create User', $DB . ' User created successfully', $msg, '/users/show');
        }
    }


    // This method is responsible for printing output
    // from database operation of Retail users.

    public function printCreatedRetailUser($data, $DB, $sameAccessStatus)
    {
        $resultInRetail = $this->userModel->getUsername($data['username'], 'get_UsernameExistsInRetail', $DB);

        // ORMS, OREIM, ORPM Proceeds here to verify
        // if user already exists with these applications
        // otherwise it will produce LDIF for the new user.
        // this also verify if a user is from other application like
        // KCS Retail and Custom Apps that needs RMS Account.

        if ($data['app'] == 'ORMS' || $data['app'] == 'OREIM' || $data['app'] == 'ORPM') {


            if ($resultInRetail) {

                $msg = strtoupper($data['ID'] . ' ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname']) . '<br>Username: ' . $data['username'] . '<br>Password: ' . $data['password'] . '<br>' . $this->getSameAccessStatus($sameAccessStatus);

                $this->dialog->SUCCESS('Update User', $DB . ' User updated successfully', $msg, '/users/show');
            } else {

                //Generate LDIF File after user is created.
                $ldiffile = $this->generateLDif($data['fname'], $data['lname'], $data['ID'], $data['username'], $data['password']);

                $data += ['ldif' => $ldiffile];

                //Shows the viewer of file contents.
                $this->view('oracle/users/ldif', $data);
            }
        } else {

            $msg = strtoupper($data['ID'] . ' ' . $data['fname'] . ' ' . $data['mname'] . ' ' . $data['lname']) . '<br>Username: ' . $data['username'] . '<br>Password: ' . $data['password'] . '<br>' . $this->getSameAccessStatus($sameAccessStatus);

            $this->dialog->SUCCESS('Create User', $DB . ' User created successfully', $msg, '/users/show');
        }
    }

    public function getSameAccessStatus($sameAccessStatus)
    {
        if ($sameAccessStatus == null) {
            return '';
        } elseif ($sameAccessStatus) {
            return '<font color="green">Granted Same Access!</font>';
        } else {
            return '<font color="red">Failed to Grant Same Access!</font>';
        }
    }

    // get the list of users
    public function show()
    {
        $data = ['search' => isset($_SESSION['Search']) ? $_SESSION['Search'] : ''];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['search' => trim(SANITIZE_INPUT_STRING(empty($_POST['searchuser']) ? '' : $_POST['searchuser']))];
        }

        $_SESSION['Search'] = $data['search'];
        $_SESSION['UserDB'] = 'DEFAULT';

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

        $this->view('oracle/users/show', $data);
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
    public function generateLDif($fname, $lname, $ID, $username, $password)
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

    // Method for user deletion.
    public function delete($username)
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $db = trim(SANITIZE_INPUT_STRING($_POST['delete_db']));

            try {

                $db = trim(SANITIZE_INPUT_STRING($_POST['delete_db']));

                $resultDeactivate = $this->userModel->deactivateUser($username, $db);

                if ($resultDeactivate) {

                    $this->dialog->SUCCESS('Delete User', ' User deletion/deactivation successful', $username . ' has been deleted/deactivated.', '/users/show');
                } else {
                    $this->dialog->FAILED('Delete User', 'User deletion/deactivation failed', 'Unable to delete/deactivate ' . $username, '/users/show');
                }
            } catch (\Exception $e) {
                $this->dialog->FAILED('Delete User', 'User deletion/deactivation failed', $e->getMessage(), '/users/show');
            }
        }
    }

    // Method for user editing
    public function edit($id)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $db = trim(SANITIZE_INPUT_STRING($_POST['edit_db']));

            $param = [
                'userid' => $id
            ];

            //get specific details and pass to view
            $result = $this->userModel->getUserDetails($param, 'RMS_getUserDetails');

            $data = $result;

            $_SESSION['CreateUserDB'] = $db;

            $this->view('oracle/users/create', $data);
        }
    }

    public function profile()
    {
        $param = [
            'username' => $_SESSION['username']
        ];

        $result = $this->userModel->getUserDetails($param, 'RMS_getUserDetailsByUsername');

        if ($result) {
            $result += ['IP' => $this->getIP()];
        }

        $data = $result;

        $this->view('oracle/users/profile', $data);
    }

    // Method for downloading LDIF Generated Files
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
                unlink($file['ldif']);
                exit();
            }
        }
    }
}
