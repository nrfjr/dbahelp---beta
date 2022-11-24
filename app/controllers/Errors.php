<?php
    class Errors extends Controller{

        
        public function __constructor()
        {
            $this->void();
        }

        public function void(){
            $this->view('error/error', $data = ['link'=>'/users/login']);
        }

    }