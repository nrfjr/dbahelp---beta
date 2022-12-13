<?php

class Security{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getGrantedUsers($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_GrantedUsers');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function getDBPrivileges($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_DatabasePrivs');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }
}