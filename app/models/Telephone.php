<?php

class Telephone{

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getContacts($search)
    {
        $this->db = new OracleDatabase('RMSPRD');
        $query = $this->fm->loadSQL('get_TelephoneContacts');

        $param = [
                    'search' => $search
        ];

        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

}