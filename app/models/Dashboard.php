<?php

    class Dashboard{

        private $db, $fm;

        public function __construct(){
            $this->db = new Database;
            $this->fm = new FileManager;
        }

        public function getTotalUsers()
        {
            $query = $this->fm->loadSQL('get_TotalUsers');

            $this->db->query($query);

            $result = $this->db->single();

            if(!empty($result)){

                return $result;
            }
            return false;
        }
    }