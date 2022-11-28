<?php

/***

This is library class for MySql Database Connections. any my sql statement should be executed here.
 
***/

    class MySqlDatabase {

        private $conn;
        private $stmt;
        private $error;

        private $count=0;

        public function __construct($DB){

            $this->conn = $this->getConn($DB);

        }

        public function getConn($dbname)    
        {
            
            // try{

            //         //return 
                    
            //     } catch(PDOException $e){

            //         redirect('errors/void');

            // }
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

            // try{

            // if(){
            //     return true;
            // }
            // }catch(\Exception $e){
            //     return false;
            // }

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