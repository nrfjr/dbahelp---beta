<?php

class Monitors extends Controller
{

    private $db, $SessionSearch;

    public function __construct()
    {
        $this->monitorModel = $this->model('Monitor');
        $this->dialog = $this->dialog('Dialog');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }
    }

    public function lockedsessions($DB)
    {
        $_SESSION['MonitorDB'] = $DB;

        if (isset($_SESSION['MonitorDB'])){
            $this->db = $_SESSION['MonitorDB'];
        }

        $result = $this->monitorModel->getLockedSessions($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('monitor/lockedsessions', $data);
    }

    public function usersessions($DB)
    {

        $data = ['SessionSearch' => isset($_SESSION['SessionSearch']) ? $_SESSION['SessionSearch'] : ''];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['SessionSearch' => trim(SANITIZE_INPUT_STRING(empty($_POST['search']) ? '' : $_POST['search']))];
        }

        $_SESSION['SessionSearch'] = $data['SessionSearch'];
        $_SESSION['MonitorDB'] = $DB;

        if (isset($_SESSION['MonitorDB'])) {
            $this->db = $_SESSION['MonitorDB'];
        }

        if (isset($_SESSION['SessionSearch']) && $_SESSION['SessionSearch'] != null || $_SESSION['SessionSearch'] != '') {
            $this->SessionSearch = $_SESSION['SessionSearch'];
        }

        $result = $this->monitorModel->getUserSessions($this->SessionSearch, $this->db);

        if ($result) {
            $data = $result;
        } else {
            $data = [];
        }

        $this->view('monitor/usersessions', $data);
    }

    public function redologgenerations($DB)
    {
        $_SESSION['MonitorDB'] = $DB;

        if (isset($_SESSION['MonitorDB'])){
            $this->db = $_SESSION['MonitorDB'];
        }

        $result = $this->monitorModel->getRedoLogGeneration($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('monitor/redogenerations', $data);
    }

    public function redologswitches($DB)
    {
        $_SESSION['MonitorDB'] = $DB;

        if (isset($_SESSION['MonitorDB'])){
            $this->db = $_SESSION['MonitorDB'];
        }

        $query = array('get_AM_RedoLogSwitches','get_PM_RedoLogSwitches');

        $result = [ 
                    'AM' => $this->monitorModel->getRedoLogSwitches($query[0], $this->db),
                    'PM' => $this->monitorModel->getRedoLogSwitches($query[1], $this->db)
                  ];

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('monitor/redologfileswitches', $data);
    }

    public function topsql($DB)
    {
        $_SESSION['MonitorDB'] = $DB;

        if (isset($_SESSION['MonitorDB'])){
            $this->db = $_SESSION['MonitorDB'];
        }

        $result = $this->monitorModel->getTopRunningSql($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('monitor/toprunningsqlprocesses', $data);
    }

    public function killuser($DB)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $sid = trim(SANITIZE_INPUT_STRING($_POST['sid']));
            $serial = trim(SANITIZE_INPUT_STRING($_POST['serial']));
            $this->db = $DB;

            try {

                $killResult = $this->monitorModel->killUserSession($sid, $serial, $this->db);

                if ($killResult) {

                    $this->dialog->SUCCESS('Kill User Session', 'User Session terminated successfully', 'SID: '.$sid .'<br>Serail No.: '.$serial. '<br>Terminated.', '/monitors/usersessions/'.$this->db);
                } else {
                    $this->dialog->FAILED('Kill User Session', 'User Session termination failed', 'Unable to terminate the following details: <br>SID: '.$sid .'<br>Serail No.: '.$serial, '/monitors/usersessions/'.$this->db);
                }

            } catch (\Exception $e) {
                $this->dialog->FAILED('Kill User Session', 'User Session termination failed', $e->getMessage(), '/monitors/usersessions/'.$this->db);
            }
        }
    }
}
