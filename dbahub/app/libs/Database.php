<?php
    class Database {
        private $db_server   = DB_SERVER;
        private $db_username;
        private $db_password;
        private $service_name;
        private $sid;
        private $port = PORT;

        private $conn;
        private $stmt;
        private $error;

        private $tns;
        private $options;

        public function __construct(){
            // Set Database to RMSPRD if no datatabase has been selected.
            if(empty($service_name)&&empty($sid)){
                $service = 'RMSPRD';
                $sid = 'RMSPRD';
            }

            $this->tns = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = '.$this->db_server.')(PORT = '.$this->port.')) (CONNECT_DATA = (SERVICE_NAME = '.(empty($service_name)? "RMSPRD" : $service_name).') (SID = '.(empty($sid)? "RMSPRD" : $sid).')))';
            $this->options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );

        }

        public function connect($username, $password)
        {
            try{
                $this->db_username = $username;
                $this->db_password = $password;
                if($this->conn = new PDO("oci:dbname=" . $this->tns . ";charset=utf8", $this->db_username, $this->db_password, $this->options)){
                    return true;
                }
                else{
                    return false;
                }
                
            } catch(PDOException $e){
                $this->error = $e->getMessage();
            }
        }

        // Prepare statement with query
        public function query($sql){
            $this->stmt = $this->conn->prepare($sql);
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
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
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