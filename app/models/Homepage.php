<?php

    class Homepage{

        private $db,$fm;

        public function __construct(){

            $this->fm = new FileManager;

        }

        public function getSession($db)
        {
            $this->db = new OracleDatabase($db);

            $query = $this->fm->loadSQL('get_TotalSessions');

            $this->db->query($query);

            $result = $this->db->single();

            if(!empty($result)){

                $data = [
                    'Session' => $result['Total Sessions']
                ];

                return $data;
            }
            return false;
        }

        public function getFRA($db)
        {
            $this->db = new OracleDatabase($db);

            $query = $this->fm->loadSQL('get_FRA');

            $this->db->query($query);

            $result = $this->db->single();

            if(!empty($result)){

                $data = [
                    'FRA' => $result['USED/FREE']
                ];

                return $data;
            }
            return false;
        }

        public function getDBStatus($db)
        {

            $this->db = new OracleDatabase($db);

            $query = $this->fm->loadSQL('get_DBStatus');

            $this->db->query($query);

            $result = $this->db->single();

            if(!empty($result)){

                $data = [
                    'DBSTATUS' => $result['DB STATUS']
                ];

                return $data;
            }
            return false;
        }

        public function getDBInfoSummary($db)
        {

            $this->db = new OracleDatabase($db);

            $query = $this->fm->loadSQL('get_DBInfoSummary');

            $this->db->query($query);

            $result = $this->db->single();

            if(!empty($result)){

                return $result;
            }
            return false;
        }


    }