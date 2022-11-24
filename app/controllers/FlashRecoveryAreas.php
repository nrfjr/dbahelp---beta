<?php
    class FlashRecoveryAreas extends Controller{

        private $fraModel;

        public function __construct()
        {
            $this->fraModel = $this->model('FlashRecoveryArea');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function fra()
        {
            self::__construct();

            $data = [
                        'RMS' => $this->fraModel->getFRA('RMSPRD'),
                        'RDW' => $this->fraModel->getFRA('RDWPRD'),
                        'OFIN' => $this->fraModel->getFRA('OFINDB')
            ];

            $this->view('flashrecoveryarea/fra', $data);
        }

    }