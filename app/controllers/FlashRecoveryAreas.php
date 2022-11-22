<?php
    class FlashRecoveryAreas extends Controller{

        private $db;

        public function __construct()
        {
            $this->userModel = $this->model('FlashRecoveryArea');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function fra()
        {
            self::__construct();

            $this->view('flashrecoveryarea/fra', []);
        }

    }