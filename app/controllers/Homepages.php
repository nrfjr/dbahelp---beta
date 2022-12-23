<?php
class Homepages extends Controller
{

    private $db;

    public function __construct()
    {

        $this->homepageModel = $this->model('Homepage');
        $this->dialog = $this->dialog('Dialog');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }
    }

    public function index($DB)
    {

        self::__construct();

        $_SESSION['HomepageDB'] = $DB;

        if (isset($_SESSION['HomepageDB'])) {
            $this->db = $_SESSION['HomepageDB'];
        }



        $data = [
            'Sessions' => $this->homepageModel->getSession($this->db)['Session'],
            'FRA' => $this->homepageModel->getFRA($this->db),
            'DB PerfStatus' => $this->homepageModel->getDBPerfStatus($this->db)['DBPerfStatus'],
            'DB Info' => $this->homepageModel->getDBInfoSummary($this->db),
            'Locked Sessions' => $this->homepageModel->getLockedSessionCount($this->db),
            'Temp TS' => $this->homepageModel->getTempTablespaceInfo($this->db),
            'DB Status' => $this->homepageModel->getDBStatus($this->db)
        ];

        $this->view('oracle/homepage/dashboard', $data);
    }

    public function delete_archive($DB)
    {
        $output = array();

        $sshConn = ssh2_connect(ARCHIVE_HOST, 22);
        usleep(100);

        ssh2_auth_password($sshConn, ARCHIVE_USERNAME, ARCHIVE_PASSWORD);
        $shell = ssh2_exec($sshConn, ARCHIVE_SCRIPT);

        usleep(100);
        $count = 0;
        while ($count < 10){
            sleep(1);
            while (($line = fgets($shell))) {
                array_push($output, $line);
            }
            $count++;
        }

        if($output){
            $this->dialog->SUCCESS('Delete Archive', 'Archive has been deleted successfully', 'Archive Deletion script has been executed successfully!', '/homepages/index/'.$DB);
        }else{
            $this->dialog->FAILED('Delete Archive', 'Archive deletion failed', 'Archive Deletion script has failed to execute.', '/homepages/index/'.$DB);
        }
    }
}
