<?php
    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');
        }

        // Redirects to Index Page
        public function users() {
            $link   = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last   = array_pop($pieces);

            $pagination = $this->userModel->pagination();


            $data = [
                'link'          => $last,
                'pagination'    => $pagination
            ];
            $this->view('users/users', $data);
        }

        // verify user login to the system
        public function login(){
            // Chech for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password'])
                ];


                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if($loggedInUser){
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

        public function createUserSession($user){
            $_SESSION['username'] = $user['username'];
            redirect('pages/dashboard');
        }

        public function logout(){
            unset($_SESSION['username']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['username'])){
                return true;
            } else {
                return false;
            }
        }

        // Create user account (Create Account Module)
        public function create()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'fname'=> trim($_POST['first-name']),
                    'mname'=> trim($_POST['middle-name']),
                    'lname'=> trim($_POST['last-name']),
                    'ID'=> trim($_POST['Id']),
                    'app'=> trim($_POST['application']),
                    'requestor'=> trim($_POST['requestor']),
                    'remarks'=> trim($_POST['remarks'])
                ];

                // //$this->db->setDatabase($data['database'], $data['sid']);

                // $fullname = strtoupper($data['fname'].' '.$data['mname'].' '.$data['lname']);
                $username = $this->generateUsername($data['fname'], $data['mname'], $data['lname'], $data['ID']);
                $password = $this->generatePassword();


                // $createdUser = $this->userModel->createUser($username, $password);

                //if($data['database'] == 'RMSPRD'){
                //$this->grantUserRoleRMS($username);
                //}

                // if($createdUser){
                    
                // Generate LDIF File after user is created.
                //$ldiffile = $this->generateLDIF($data['fname'],$data['lname'],$data['ID'],$username,$password);

                // Shows the viewer of file contents.
                $this->view('users/ldif', $data = [ 'lorem' => '']);

                // }

                // $this->view('users/create', $data);

            } else {
                $data = [
                    'fname'=> '',
                    'mname'=> '',
                    'lname'=> '',
                    'ID'=> '',
                    'app'=> '',
                    'requestor'=> '',
                    'remarks'=> ''
                ];
               $this->view('users/create', $data);
            }
        }

        // gets list of users
        public function show()
        {
            //$result = $this->userModel->getUserList($_GET['search']);
            $data = [];
            $this->view('users/show', $data);
        }

        public function generateUsername($fname, $mname, $lname, $ID)  
        {
            $username = substr($fname,0,1).($mname==null? "" :substr($mname,0,1)).preg_replace('/\s+/','',$lname).$ID;
            return strtoupper($username);
        }

        public function generatePassword()
        {
            $password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3) . rand(10000, 99999);
            return $password;
        }

        public function generateLDIF($fname, $lname, $ID, $username, $password ){
            $givenName = strtoupper($fname);
            $surName = strtoupper($lname);
            $cn= $username;
            $uid= $username;
            $mail= $username."@kccmalls.com";
            $employeeNum = $ID;
            $LDIF = "dn: cn=$username,cn=Users,dc=kccmalls,dc=com\nobjectclass: top\nobjectclass: organizationalperson\nobjectclass: person\nobjectclass: inetorgperson\nobjectclass: KCCOBJ\nobjectclass: rsimUser\ngivenname: $givenName\nsn: $surName\ncn: $cn\nuid: $uid\nemployeenumber: $employeeNum\nmail: $mail\ndescription: Department Store\ndisplayname: $cn\npreferredlanguage: en\nuserstore: rsimStoreId=2,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=1,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=3,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=4,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=5,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=6,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=7,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=8,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=9,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=41,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=42,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=43,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=45,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=46,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=44,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=47,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=48,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserstore: rsimStoreId=49,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nemploymentstatus: 0\nssn: 123456789\npreferredcountry: US\nuserrole: rsimRoleName=KCC Admin,cn=rsimRoles,cn=RSIM,dc=kccmalls,dc=com\nhomestore: rsimStoreId=2,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com\nuserpassword: $password";

            $file = fopen("$username.ldif", "w") or die("Unable to open file!");
            fwrite($file, $LDIF);
            fclose($file);
            return $username.'.ldif';
            exit();
            
        }

        public function insertToUserMaster($database, $data)
        {
            $db_owner ='dbadmins.';
            $db_link = '';

            if ($database == 'RDWPRD') {
                $db_link = '@kccreports_dbadmins_link';
            }

            $query="insert into ".$db_owner.".user_master".$db_link." (id,username,password,db_name,application,date_created,status,requestor,created_by,remarks)values ('".$db_owner."'.user_master_seq.nextval".$db_link.",'".$data['username']."','".$data['password']."','".$database."','".$data['app']."',(select to_char(sysdate,'dd-Mon-yy') from dual),'ACTIVE','".$data['requestor']."','".$this->IP."','".$data['remarks']."');";
            
            $this->db->query($query);
            $this->db->execute();
        }

        public function grantUserRoleRMS($username)
        {
        $roles = array("GRANT CREATE SESSION TO ", 
                "GRANT CREATE TABLE TO", 
                "GRANT CREATE PROCEDURE TO ", 
                "GRANT CREATE VIEW TO ", 
                "GRANT DELETE ANY TABLE TO ", 
                "GRANT INSERT ANY TABLE TO ",
                "GRANT SELECT ANY TABLE TO ",
                "GRANT UPDATE ANY TABLE TO ",
                "GRANT SELECT ANY SEQUENCE TO ",
                "GRANT EXECUTE ANY PROCEDURE TO ",
                "GRANT CREATE ANY PROCEDURE TO ",
                "GRANT DROP ANY PROCEDURE TO ",
                "GRANT EXECUTE ANY PROCEDURE TO ",
                "GRANT CREATE ANY TABLE TO ",
                "GRANT DROP ANY TABLE TO ",
                "GRANT SELECT ANY TABLE TO ",
                "GRANT CREATE ANY CONTEXT TO ",
                "GRANT ALTER SESSION TO ",
                "GRANT ANALYZE ANY TO ",
                "GRANT CREATE ANY SYNONYM TO ",
                "GRANT CREATE ANY TYPE TO ",
                "GRANT CREATE DATABASE LINK TO ",
                "GRANT CREATE LIBRARY TO ", 
                "GRANT CREATE MATERIALIZED VIEW TO ",
                "GRANT CREATE PUBLIC DATABASE LINK TO ",
                "GRANT CREATE PUBLIC SYNONYM TO ",
                "GRANT CREATE SEQUENCE TO ",
                "GRANT CREATE SYNONYM TO ",
                "GRANT CREATE TRIGGER TO ",
                "GRANT DROP ANY SYNONYM TO ",
                "GRANT EXECUTE ANY TYPE TO ",
                "GRANT QUERY REWRITE TO ");
        
            
        foreach ($roles as $role){
            $this->db->query($role . $username.";");
            $this->db->execute();
        }

        }
    }