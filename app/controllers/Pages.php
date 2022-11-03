<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('User');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function index() {
            $link = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last = array_pop($pieces);

            $data = [];
            $this->view('pages/dashboard', $data);
        }
        // Load JSON data sample
        public function data() {
            $this->loadJson('data');
        }
    }