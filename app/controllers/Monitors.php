<?php

class Monitors extends Controller
{

    private $db, $SessionSearch;

    public function __construct()
    {
        $this->monitorModel = $this->model('Monitor');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }
    }

    public function lockedsessions()
    {
        $this->view('monitor/lockedsessions', []);
    }

    public function usersessions($DB)
    {

        $data = ['SessionSearch' => isset($_SESSION['SessionSearch']) ? $_SESSION['SessionSearch'] : ''];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['SessionSearch' => trim(SANITIZE_INPUT_STRING(empty($_POST['search']) ? '' : $_POST['search']))];
        }

        $_SESSION['SessionSearch'] = $data['SessionSearch'];
        $_SESSION['UserSessionsDB'] = $DB;

        if (isset($_SESSION['UserSessionsDB'])) {
            $this->db = $_SESSION['UserSessionsDB'];
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

    public function redologgenerations()
    {
        $this->view('monitor/redogenerations', []);
    }

    public function redologswitches()
    {
        $this->view('monitor/redologfileswitches', []);
    }

    public function rmanbackupreports()
    {
        $this->view('monitor/rmanbackupreports', []);
    }

    public function topsql()
    {
        $this->view('monitor/toprunningsqlprocesses', []);
    }
}
