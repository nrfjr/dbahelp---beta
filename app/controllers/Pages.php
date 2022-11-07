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

                'usercount' => $result['Total Users']

            ];
            $this->view('pages/dashboard', $data);
        }
    }