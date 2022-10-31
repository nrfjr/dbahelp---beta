<?php
    class User {
        private $db;
        private $total_records_per_page = 9;

        public function __construct(){
            $this->db = new Database;
        }

        public function login($username, $password){

            $row = $this->db->connect($username,$password);

            if(!empty($row)){
                $data = [
                    'username' => $username,
                    'password' => $password
                ];
                return $data;
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
           $query="SELECT STATEMENT FROM db_table where column = '".$search."'";
           $this->db->query($query);
           $result = $this->db->execute($query);
           
           if($result){
                return $result;
           }

           return false;
        }

        public function pagination()
        {
            
        }
        

    }