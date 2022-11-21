<?php
    class User {
        private $db, $fm;
        private $total_records_per_page = 9;

        public function __construct(){

            $this->fm = new FileManager;
        }

        //makes sure that username and password connect and exist in the database
        public function login($username, $password){

            $this->db = new OracleDatabase('RMSPRD');

            $query = $this->fm->loadSQL('get_Username');
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
        public function createUser($username, $password, $db){

            $this->db = new OracleDatabase($db);

            $query = str_replace(array(":username", ":password"), array($username, $password), $this->fm->loadSQL('RMS_createUser'));

            $this->db->query($query);

            $result = $this->db->execute();

            if(!empty($result)){

                return true;
            }
            return false;

        }

        //gets userlist from usermaster 
        public function getUserList($search, $db)
        {     
            $this->db = new OracleDatabase($db);  
           $query=$this->fm->loadSQL('get_UserMasterList');
           $param = [
                        ':search' => $search[':search']
                    ];
            $this->db->queryWithParam($query,$param);

            $result = $this->db->resultSet($query);
           
           if($result){
                return $result;
           }

           return false;
        }

        public function insertToUserMaster($data, $db)
        {
            $this->db = new OracleDatabase($db); 

            $query=$this->fm->loadSQL('insertToUserMaster');

            $param = [
                        ':username' => $data['username'],
                        ':password' => $data['password'],
                        ':db_name' => 'RMSPRD',
                        ':application' => $data['application'],
                        ':status' => 'ACTIVE',
                        ':requestor' => $data['requestor'],
                        ':created_by' => $data['ip'],
                        ':remarks' => $data['remarks']
                    ];
            
            $this->db->queryWithParam($query, $param);
            $this->db->execute();
        }

        public function insertToUserAttrib($data, $db){

            $this->db = new OracleDatabase($db); 

            $query=$this->fm->loadSQL('insertToUserAttrib');

            $param = [
                        ':username' => $data['username']
                    ];

            $this->db->queryWithParam($query, $param);

            $this->db->execute();

        }

        public function insertToUserAccounts($data, $db){

            $this->db = new OracleDatabase($db); 

            $query=$this->fm->loadSQL('insertToUserAccount');

            $param = [
                        ':id' => $data['ID'],
                        ':firstname' => $data['fname'],
                        ':middlename' => $data['mname'],
                        ':lastname' => $data['lname'],
                        ':password' => $data['password'],
                        ':username' => $data['username'],
                        ':status' => $data['status']
                    ];

            $this->db->queryWithParam($query, $param);

            $this->db->execute();

        }

        
        public function grantUserRoleRMS($username)
        {
        $RMS = array("GRANT CREATE SESSION TO ", 
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

        }

    }