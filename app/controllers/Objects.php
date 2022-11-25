<?php

class Objects extends Controller{

    
    public function __construct(){
        $this->objectModel = $this->model('ObjectModel');

        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function invalidobjects()
    {
        $this->view('object/invalidobjects',[]);
    }
    
}