<?php
    class Errors extends Controller {

        public function __construct() {

            if(!isset($_SESSION['username'])) {
                $this->errorHandler();
            }
        }

        public function errorHandler()
        {
            $this->view('error/error', $data =[]);
        }

    }