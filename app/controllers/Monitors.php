<?php

/***
 * 
 *      Monitor Controller (Topbar Function) 
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

        $this->view('oracle/monitor/lockedsessions', $data);
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

        $this->view('oracle/monitor/usersessions', $data);
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

        $this->view('oracle/monitor/redogenerations', $data);
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

        $this->view('oracle/monitor/redologfileswitches', $data);
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

        $this->view('oracle/monitor/toprunningsqlprocesses', $data);
    }

    public function kill($DB)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $base = trim(SANITIZE_INPUT_STRING($_POST['base']));
            $sid = trim(SANITIZE_INPUT_STRING($_POST['sid']));
            $serial = trim(SANITIZE_INPUT_STRING($_POST['serial']));
            $this->db = $DB;

            try {

                $killResult = $this->monitorModel->killSession($sid, $serial, $this->db);

                if ($killResult) {

                    $this->dialog->SUCCESS('Kill Session', 'Session terminated successfully', 'SID: '.$sid .'<br>Serial No.: '.$serial. '<br>Terminated.', '/monitors'.'/'.$base.'/'.$this->db);
                } else {
                    $this->dialog->FAILED('Kill Session', 'Session termination failed', 'Unable to terminate the following details: <br>SID: '.$sid .'<br>Serial No.: '.$serial, '/monitors'.'/'.$base.'/'.$this->db);
                }

            } catch (\Exception $e) {
                $this->dialog->FAILED('Kill Session', 'Session termination failed', $e->getMessage(), '/monitors'.'/'.$base.'/'.$this->db);
            }
        }
    }
}
