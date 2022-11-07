<?php
    class Database {
        private $db_server   = DB_SERVER;
        private $db_username = 'rms13prd';
        private $db_password = 'rms13prd';
        private $service_name;
        private $sid;
        private $port=PORT;

        private $conn;
        private $stmt;
        private $error;

        private $count=0;

        private $tns;
        private $options;

        public function __construct(){

            $this->tns = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = '.$this->db_server.')(PORT = '.$this->port.')) (CONNECT_DATA = (SERVICE_NAME = '.(empty($this->service_name)? "RMSPRD" : $this->service_name).') (SID = '.(empty($this->sid)? "RMSPRD" : $this->sid).')))';
            $this->options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
            
            try{
                    $this->conn = new PDO("oci:dbname=" . $this->tns . ";charset=utf8", $this->db_username, $this->db_password, $this->options);
                    
                } catch(PDOException $e){
                    $this->error = $e->getMessage();
                }

        }
        public function test_connection($username, $password){

            if($this->conn = new PDO("oci:dbname=" . $this->tns . ";charset=utf8", $username, $password, $this->options)){
                return true;
            }
            else{
                return false;
            }

        }

        // Prepare statement with query
        public function query($sql){
            $this->stmt = $this->conn->prepare($sql);
        }
        // Prepare statement with query with parameters
        public function queryWithParam($sql, $param = []){

            $this->stmt = $this->conn->prepare($sql);

            foreach($param as $bindTarget => $ParamValue){
                $this->stmt->bindParam($bindTarget, $ParamValue);
            }
        }
        // Execute the prepared statement
        public function execute(){
            return $this->stmt->execute();
        }
        public function setDatabase($dbname, $sid)
        {
            $this->service_name = $dbname;
            $this->sid = $sid;
        }

        // Get result set as array of objects
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll();
        }

        // Get single record as object
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function setFetch(){
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }

/*
Please do increment the number if you have encounter a problem that make your head go brrrrrrrrrrrrrrrrrr.

HEADACHE COUNTER = 56;

*/