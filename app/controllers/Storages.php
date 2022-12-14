<?php

class Storages extends Controller
{

    private $db;

    public function __construct()
    {
        $this->storageModel = $this->model('Storage');

        if (!isset($_SESSION['username'])) {
            redirect('/users/login');
        }
    }

    public function dbfilelayout($DB)
    {
        $_SESSION['StorageDB'] = $DB;

        if (isset($_SESSION['StorageDB'])) {
            $this->db = $_SESSION['StorageDB'];
        }

        $datafiles = $this->storageModel->getDatafiles($this->db);
        $logfiles = $this->storageModel->getLogfiles($this->db);
        $controlfiles = $this->storageModel->getControlfiles($this->db);

        $data = [
            'datafiles' => ($datafiles) ? $datafiles : [],
            'logfiles' => ($logfiles) ? $logfiles : [],
            'controlfiles' => ($controlfiles) ? $controlfiles : []
        ];

        $this->view('oracle/storage/dbfilelayout', $data);
    }

    public function tableidx($DB)
    {
        $_SESSION['StorageDB'] = $DB;

        if (isset($_SESSION['StorageDB'])) {
            $this->db = $_SESSION['StorageDB'];
        }

        $this->view('oracle/storage/tableidx', []);
    }

    public function tablemonitoring($DB)
    {
        $_SESSION['StorageDB'] = $DB;
        $_SESSION['tablename'] = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_SESSION['tablename'] = $_POST['table'];

        }

        if ($_SESSION['tablename'] == null) {
            $_SESSION['tablename'] = 'all_tables';
        } else {
            $_SESSION['tablename'] = $_SESSION['tablename'];
        }

        if (isset($_SESSION['StorageDB'])) {
            $this->db = $_SESSION['StorageDB'];
        }

        $analysis = $this->storageModel->getTableAnalysis($_SESSION['tablename'], $this->db);

        if ($analysis) {
            $data = $analysis;
        } else {
            $data = [];
        }

        $this->view('oracle/storage/tablemonitoring', $data);
    }
}
