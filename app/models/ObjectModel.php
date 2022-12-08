<?php

class ObjectModel{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getInvalidObject($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_InvalidObjects');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }
}