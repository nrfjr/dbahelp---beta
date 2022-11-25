<?php

class Storages extends Controller{

    
    public function __construct(){
        $this->storageModel = $this->model('Storage');

        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function dbfilelayout()
    {
        $this->view('storage/dbfilelayout',[]);
    }

    public function tableindexes()  
    {
        $this->view('storage/tableindexes',[]);
    }

    public function tablemonitoring()  
    {
        $this->view('storage/tablemonitoring',[]);
    }

    public function tablespaceusage()  
    {
        $this->view('storage/tablespaceusage',[]);
    }
    
}