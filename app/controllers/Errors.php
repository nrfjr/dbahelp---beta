<?php
    class Errors extends Controller {

        public function __construct() {

            if(!isset($_SESSION['username'])) {
                $this->void();
            }
        }

        public function void()
        {
            $this->view('error/error', $data =['link' => '/users/login']);
        }

    }