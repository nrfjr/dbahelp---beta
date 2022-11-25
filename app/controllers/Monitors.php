<?php

class Monitors extends Controller{

    
    public function __construct(){
        $this->monitorModel = $this->model('Monitor');

        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function lockedsessions()
    {
        $this->view('monitor/lockedsessions',[]);
    }

    public function usersessions()  
    {
        $this->view('monitor/usersessions',[]);
    }

    public function redologgenerations()
    {
        $this->view('monitor/redogenerations',[]);
    }

    public function redologswitches()
    {
        $this->view('monitor/redologfileswitches',[]);
    }

    public function rmanbackupreports()
    {
        $this->view('monitor/rmanbackupreports',[]);
    }

    public function topsql()
    {
        $this->view('monitor/toprunningsqlprocesses',[]);
    }
    
}