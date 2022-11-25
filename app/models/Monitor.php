<?php

class Monitor{

    private $rmsdb, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }
}