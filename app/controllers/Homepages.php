<?php
    class Homepages extends Controller {

        private $db;

        public function __construct() {

            $this->homepageModel = $this->model('Homepage');

            if (!isset($_SESSION['username'])) {
                redirect('users/login');
            }

        }

        public function index($DB) {

            self::__construct();
  
            $_SESSION['HomepageDB'] = $DB;
         

            if (isset($_SESSION['HomepageDB'])){
                $this->db = $_SESSION['HomepageDB'];
            }



            $data = [
                        'Sessions' => $this->homepageModel->getSession($this->db)['Session'],
                        'FRA' => $this->homepageModel->getFRA($this->db),
                        'DB Status' => $this->homepageModel->getDBStatus($this->db)['DBSTATUS'],
                        'DB Info' => $this->homepageModel->getDBInfoSummary($this->db),
                        'Locked Sessions' => $this->homepageModel->getLockedSessionCount($this->db),
                        'Temp TS' =>$this->homepageModel->getTempTablespaceInfo($this->db)
            ];

            $this->view('oracle/homepage/dashboard', $data);

        }

        

    }