<?php

class FlashRecoveryArea{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }
}