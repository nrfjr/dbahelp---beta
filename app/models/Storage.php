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
        } else {
            return false;
        }
    }

    public function getLogfiles($db)
    {   
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_Logfiles');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getControlfiles($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_Controlfiles');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}