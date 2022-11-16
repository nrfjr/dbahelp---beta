<?php

class DiskStorage{

    private $rmsdb, $fm;

    public function __construct(){
        $this->rmsdb = new RMS_Database;
        $this->fm = new FileManager;
    }
}