<?php

    class Dashboard{

        private $db, $fm;

        public function __construct(){
            $this->db = new Database;
            $this->fm = new FileManager;


        }

        public function getSession()
        {
            $query = $this->fm->loadSQL('get_TotalSessions');
    
            $this->db->query($query);
    
            $result = $this->db->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }

    }