<?php

class Telephone{

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getContacts()
    {
        $this->db = new OracleDatabase('RMSPRD');
        $query = $this->fm->loadSQL('get_TelephoneContacts');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

}