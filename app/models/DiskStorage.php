<?php

class DiskStorage{

    private $db, $fm;

    public function __construct(){
        $this->db = new Database;
        $this->fm = new FileManager;
    }
}