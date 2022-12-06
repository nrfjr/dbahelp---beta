<?php

class Storages extends Controller{

    private $db;
    
    public function __construct(){
        $this->storageModel = $this->model('Storage');

        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function dbfilelayout($DB)
    {
        $_SESSION['StorageDB'] = $DB;

        if(isset($_SESSION['StorageDB'])){
            $this->db = $_SESSION['StorageDB'];
        }

        $datafiles = $this->storageModel->getDatafiles($this->db);
        $logfiles = $this->storageModel->getLogfiles($this->db);
        $controlfiles = $this->storageModel->getControlfiles($this->db);

        $data = [
                    'datafiles' => ($datafiles)?$datafiles:[],
                    'logfiles' => ($logfiles)?$logfiles:[],
                    'controlfiles' => ($controlfiles)?$controlfiles:[]
                  ];

        $this->view('storage/dbfilelayout',$data);
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