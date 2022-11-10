<?php
    class Pages extends Controller {
        public function __construct() {
            $this->dashboardModel = $this->model('Dashboard');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function index() {
            
            $result = $this->dashboardModel->getTotalUsers();

            $data = [

                'usercount' => $result['Total Users'],
                'donut' => $this->getDF(RMSPRD)

            ];
            $this->view('pages/dashboard', $data);
        }

        public function diskstorage()
        {
            $this->view('pages/diskstorage', $data=[]);
        }

        public function getDF($FTP_DIR_WITH_FILE)       
        {
            $filename = $FTP_DIR_WITH_FILE;
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));
            fclose($handle);

            return json_decode($contents, true);
        }
    }