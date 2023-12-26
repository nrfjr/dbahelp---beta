<?php

/***
 * 
 *      Storages Controller (Topbar Function) 
 *      Created: December 15, 2022 (Not Exact)
 *      Created By: Nurfajar S. Sali
 * 
 *      This class contains methods that fetch data from
 *      Model class, these methods are also responsible on
 *      passing data to view, as these methods passes which
 *      views are appropriate for certain method calls along
 *      with necessary data.
 * 
 *      We made sure that methods are name after its purpose.
 *      So it is undestandable what are their process is all
 *      about.
 * 
 *      Comments are quite annoying if put in every line,
 *      whereas comments should be solid and intact but 
 *      informative as this for example.
 * 
 *      if there are confusing lines in the code below, you
 *      can email me at Gmail: nurfajarsali@gmail.com
 * 
 */

class Storages extends Controller
{

    private $db;

    public function __construct()
    {
        $this->storageModel = $this->model('Storage');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
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

        if(!isset($_SESSION['tableowner'])){
            $_SESSION['tableowner'] = '';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_SESSION['tableowner'] = $_POST['owner'];

        }

        if (isset($_SESSION['StorageDB'])) {
            $this->db = $_SESSION['StorageDB'];
        }

        $indexes = $this->storageModel->getTableIndexes($_SESSION['tableowner'], $this->db);
        $owners = $this->storageModel->getTableOwners($this->db);

            $data = [
                        'Indexes' => ($indexes)? $indexes: [],
                        'Owners' => ($owners)? $owners: []
                    ];

        $this->view('oracle/storage/tableidx', $data);
    }

    public function tablemonitoring($DB)
    {
        $_SESSION['StorageDB'] = $DB;
        
        if(!isset($_SESSION['tablename'])){
            $_SESSION['tablename'] = 'all_tables';
        }   

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_SESSION['tablename'] = $_POST['table'];

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
