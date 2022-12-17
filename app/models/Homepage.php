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

            $param = [
                        'p1' => 'SYSMAN',
                        'p2' => 'TAFRHOSP',
                        'p3' => 'DBSNMP',
                        'p4' => 'APEX_PUBLIC_USER',
                        'p5' => 'ALLOC13PRD',
                        'p6' => 'SYS',
                        'p7' => 'SYSTEM',
                        'status' => 'ACTIVE'
            ];

            $this->db->queryWithParam($query,$param);

            $result = $this->db->single();

            if (!empty($result)){

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

            if (!empty($result)){

                $data = [
                    'FRA Size' => $result['FRA SIZE'],
                    'FRA Usage' => $result['FRA USAGE'],
                    'FRA Percentage' => $result['FREE / USED'],
                    'FRA Location' => $result['Location'],
                    'FRA Reclaimable' => $result['Reclaimable']
                ];

                return $data;
            }
            return false;
        }

        public function getDBPerfStatus($db)
        {

            $this->db = new OracleDatabase($db);

            $query = $this->fm->loadSQL('get_DBPerfStatus');

            $this->db->query($query);

            $result = $this->db->single();

            if (!empty($result)){

                $data = [
                    'DBPerfStatus' => $result['DB STATUS']
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

            if (!empty($result)){

                return $result;
            }
            return false;
        }

        public function getLockedSessionCount($db)
        {
            $this->db = new OracleDatabase($db);

            $query = $this->fm->loadSQL('get_LockedCount');

            $param = [
                        'type' => 'TX',
            ];

            $this->db->queryWithParam($query,$param);

            $result = $this->db->single();

            if (!empty($result)){

                return $result['LOCK COUNT'];
            }
            return false;
        }

        public function getTempTablespaceInfo($db)
        {
            $this->db = new OracleDatabase($db);

            if ($db==='OFINDB'){
                $query = $this->fm->loadSQL('OFIN_get_TempTSInfo');
            }
            else{
                $query = $this->fm->loadSQL('get_TempTSInfo');
            }

            $this->db->query($query);

            $result = $this->db->resultSet();

            if (!empty($result)){

                return $result;
            }
            return 0;
        }


    }