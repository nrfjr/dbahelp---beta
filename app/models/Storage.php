<?php

class Storage{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getDatafiles($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_Datafiles');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function getLogfiles($db)
    {   
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_Logfiles');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function getControlfiles($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_Controlfiles');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;

    }

    public function getTableAnalysis($tablename, $db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get _TableAnalysis');

        $this->db->query(str_replace(':table',$tablename,$query));

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function getTableIndexes($owner, $db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_TableIndexes');

        $param = [
                    'p_owner' => $owner
                ];

        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function getTableOwners($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_TableOwners');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;

    }
}