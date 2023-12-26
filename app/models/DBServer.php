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

    public function upsertDB($param, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('upsertToDBServerList(:p_id, :p_hostname, :p_ip, :p_db_version, :p_os, :p_uname, :p_pwd, :p_affl, :p_cty)');

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function upsertApps($param, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('upsertToAppsServerList(:p_id, :p_hostname, :p_ip, :p_os, :p_uname, :p_pwd, :p_affl, :p_url, :p_cty)');

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id, $type, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('DeleteFromList(:p_id, :p_type)');

        $param = [
            'p_id' => (int)$id,
            'p_type' => $type
        ];

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}