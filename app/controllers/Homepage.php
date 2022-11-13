<?php
    class Homepage extends Controller {
        public function __construct() {
            $this->dashboardModel = $this->model('Dashboard');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function index() {

            $data = [
                        'RMSSessions' => $this->getRMSSessions()
            ];
            
            $this->view('homepage/dashboard', $data);

        }

        public function getRMSSessions(){

            return  $this->dashboardModel->getSession()['Total Sessions'];
            
        }


    }