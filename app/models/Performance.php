<?php

class Performance{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getPGATarget($db){

        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_PGATarget');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getSGATarget($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_SGATarget');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getBufferCache($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_BufferCache');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getBufferCacheHR($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_BufferCacheHitRatio');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getDictionaryHR($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_DictionaryHitRatio');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getLibraryMR($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_LibraryCacheMissRatio');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getLatchMR($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_LatchMissRatio');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getTableStatistics($db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_TableStatistics');
        $this->db->query($query);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}