<?php

class Performance{

    private $rmsdb, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }
}