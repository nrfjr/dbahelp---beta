<?php
    class Homepage extends Controller {
        public function __construct() {
            $this->dashboardModel = $this->model('Dashboard');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function index() {
            
            $this->view('homepage/dashboard', $data=[]);
        }


    }