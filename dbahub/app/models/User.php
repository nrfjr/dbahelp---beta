<?php
    class User {
        private $db, $fm;
        private $total_records_per_page = 9;

        public function __construct(){
            $this->db = new Database;
            $this->fm = new FileManager;
        }

        //makes sure that username and password connect and exist in the database
        public function login($username, $password){

            $query = $this->fm->loadSQL('getUsername');
            $param = [
                ':username' => $username
             ];

            $this->db->queryWithParam($query, $param);
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

        //create user by provided username and password
        public function createUser($username, $password){

            $query = $this->fm->loadSQL('RMS_createUser');

            $param = [
                        ':username' => $username,
                        ':password' => $password
                     ];

            $this->db->queryWithParam($query, $param);

            $result = $this->db->execute();

            if(!empty($result)){
                return true;
            }
            return false;

        }

        //gets userlist from usermaster 
        public function getUserList($search)
        {       
           $query=$this->fm->loadSQL('getUser_MasterList');
           $param = [
                        ':search' => $search
                    ];
           $this->db->queryWithParam($query,$param);

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