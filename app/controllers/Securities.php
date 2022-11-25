<?php

class Securities extends Controller{

    
    public function __construct(){
        $this->securityModel = $this->model('Security');

        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function roleprivilege()
    {
        $this->view('security/roleprivilege',[]);
    }

    public function ldifforsso()
    {
        $this->view('security/ldifforsso',[]);
    }
    
}