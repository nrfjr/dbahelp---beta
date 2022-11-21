<?php
    class OracleDatabase {
        
        private $conn;
        private $stmt;
        private $error;

        private $count=0;

        public function __construct($DB){

            $this->conn = $this->getConn($DB);

        }

        public function getConn($dbname)    
        {
            
            try{

                    if($dbname === 'RDWPRD'){
                        return new PDO("oci:dbname=" . $this->getTNS(RDW_HOST, DEFAULT_PORT, RDW_SID). ";charset=utf8", RDW_USERNAME, RDW_PASSWORD, $this->getOption());
                    }else if ($dbname === 'OFINDB'){
                        return new PDO("oci:dbname=" . $this->getTNS(OFIN_HOST, DEFAULT_PORT, OFIN_SID). ";charset=utf8", OFIN_USERNAME, OFIN_PASSWORD, $this->getOption());
                    }else{
                        return new PDO("oci:dbname=" . $this->getTNS(RMS_HOST, DEFAULT_PORT, RMS_SID). ";charset=utf8", ADMIN_USERNAME, ADMIN_PASSWORD, $this->getOption());
                    }
                    
                } catch(PDOException $e){
                    redirect('errors/void');
            }
        }

        public function getTNS($server, $port, $sid)
        {
            $TNS =  '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = '.$server.')(PORT = '.$port.')) (CONNECT_DATA = (SERVICE_NAME = '.$sid.') (SID = '.$sid.')))';
            return $TNS;
        }

        public function getOption()
        {
            $option = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
            
            return $option;
        }

        public function test_connection($username, $password){

            try{

            if(new PDO("oci:dbname=" . $this->getTNS(RMS_HOST, DEFAULT_PORT, RMS_SID). ";charset=utf8", $username, $password, $this->getOption())){
                return true;
            }
            }catch(\Exception $e){
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
            try{
                return $this->stmt->execute();
            }catch(\Exception $e){
                return false;
            }
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
