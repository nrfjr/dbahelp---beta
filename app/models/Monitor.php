<?php

class Monitor{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getUserSessions($search, $db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_UserSessions');
        $param = [
            'search' => $search,
            'p1' => 'SYSMAN',
            'p2' => 'TAFRHOSP',
            'p3' => 'DBSNMP',
            'p4' => 'APEX_PUBLIC_USER',
            'p5' => 'ALLOC13PRD',
            'p6' => 'SYS',
            'p7' => 'SYSTEM'
        ];
        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getLockedSessions($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_LockedSessions');
        $param = [
            'p_time' => 60,
            'p_type' => 'TM'
        ];
        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
        
    }

    public function getRedoLogSwitches($query, $db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL($query);
        $param = [
                    'A' => 1,
                    'B' => 0,
                    'p_week' => 7
                ];
        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
        
    }

    public function getTopRunningSql($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_TOPRunningSQL');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
        
    }
}