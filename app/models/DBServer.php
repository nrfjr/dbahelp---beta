<?php

class DBServer{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getDBServerList($category, $db)    
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_DBServerList');

        $param = [
                    'p_cty' => $category
        ];

        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function getAppsServerList($category, $db)
    {       
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_AppsServerList');

        $param = [
                    'p_cty' => $category
        ];

        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
        return false;
    }

}