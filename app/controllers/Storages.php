<?php

class Storages extends Controller{

    private $db;
    
    public function __construct(){
        $this->storageModel = $this->model('Storage');

        if (!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function dbfilelayout($DB)
    {
        $_SESSION['StorageDB'] = $DB;

        if (isset($_SESSION['StorageDB'])){
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

    public function tableindexes($DB)  
    {
        $_SESSION['StorageDB'] = $DB;

        if (isset($_SESSION['StorageDB'])){
            $this->db = $_SESSION['StorageDB'];
        }

        $this->view('storage/tableindexes',[]);
    }

    public function tablemonitoring($DB)  
    {

        $_SESSION['StorageDB'] = $DB;

        if (isset($_SESSION['StorageDB'])){
            $this->db = $_SESSION['StorageDB'];
        }

        $this->view('storage/tablemonitoring',[]);
    }
    
}