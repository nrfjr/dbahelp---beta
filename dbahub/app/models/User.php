<?php
    class User {
        private $db;
        private $total_records_per_page = 9;

        public function __construct(){
            $this->db = new Database;
        }

        public function login($username, $password){

            $query = "SELECT USERNAME FROM DBA_USERS WHERE USERNAME ='$username'";
            $this->db->query($query);
            $row = $this->db->single();

            $result = $this->db->test_connection($username, $password);

            if($result){
                if($row['USERNAME']==$username){
                    $data = [
                        'username' => $row['USERNAME'],
                        'password' => $password
                    ];
                    return $data;
                }
            } else {
               return false;
            }
        }

        public function createUser($username, $password){

            $query = "CREATE USER $username DEFAULT TABLESPACE RETEK_DATA IDENTIFIED BY $password";
            $this->db->query($query);

            $result = $this->db->execute();

            if(!empty($result)){
                return true;
            }
            return false;

        }

        public function getUserList($search)
        {       
           $query="SELECT ROWNUM, ID, USERNAME, PASSWORD, DB_NAME, APPLICATION, DATE_CREATED, REQUESTOR, REMARKS, STATUS FROM USER_MASTER WHERE USERNAME IN (SELECT USERNAME FROM DBA_USERS) AND USERNAME LIKE'%'";
           $this->db->query($query);
           $result = $this->db->resultSet($query);
           
           if($result){
                return $result;
           }

           return false;
        }

        public function pagination()
        {
            
        }
        

    }