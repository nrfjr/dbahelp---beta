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
        $output = $this->executeCommand(ARCHIVE_HOST, is_null(ARCHIVE_PORT)?22:ARCHIVE_PORT, ARCHIVE_USERNAME, ARCHIVE_PASSWORD, ARCHIVE_SCRIPT);

        if($output){
            $this->dialog->SUCCESS('Delete Archive', 'Archive has been deleted successfully', 'Archive Deletion script has been executed successfully!', '/homepages/index/'.$DB);
        }else{
            $this->dialog->FAILED('Delete Archive', 'Archive deletion failed', 'Archive Deletion script has failed to execute.', '/homepages/index/'.$DB);
        }
    }

    public function executeCommand($host, $port, $username, $password, $command) {
        $connection = ssh2_connect($host, $port);
        if (ssh2_auth_password($connection, $username, $password)) {
            $stream = ssh2_exec($connection, $command);
            stream_set_blocking($stream, true);
            $response = stream_get_contents($stream);
            fclose($stream);
            return $response;
        }
        return false;
    }
}
