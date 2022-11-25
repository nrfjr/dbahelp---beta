<?php

class ObjectModel{

    private $rmsdb, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }
}