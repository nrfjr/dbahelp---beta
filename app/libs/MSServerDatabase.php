<?php

/***

This is library class for MS Database Connections. any ms sql statement should be executed here.
 
***/

    class MSServerDatabase {

        private $conn;
        private $stmt;
        private $error;

        private $count=0;

        public function __construct(){

            $this->conn = $this->getConn();

        }

        public function getConn($dbname)    
        {
            try{
            
                if(in_array($dbname, array_keys(MSSQL_DBS))){
			        $conn = new PDO($this->getDSN(MSSQL_DBS[$dbname][0], MSSQL_DEFAULT_PORT), MSSQL_DBS[$dbname][1], MSSQL_DBS[$dbname][2]);
                }else{
                    $conn = new PDO($this->getDSN(MSSQL_DBS['DEFAULT'][0], MSSQL_DEFAULT_PORT), MSSQL_DBS['DEFAULT'][1], MSSQL_DBS['DEFAULT'][2]);
                }

			    return $conn;
			}
			 catch(PDOException $e){   
				echo "Error connecting to SQL Server: ".$e->getMessage();    
			} 
        }

        public function getDSN($ip, $port){
            return 'sqlsrv:Server='.$ip.','.$port;
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
        // Get row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }