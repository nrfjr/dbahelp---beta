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

        public function resize()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $size = trim(SANITIZE_INPUT_STRING($_POST['size']));
                $db = trim(SANITIZE_INPUT_STRING($_POST['db']));

                $result = $this->fraModel->resizeRFA($size, $db);

                if($result == 1){

                }
                else
                {

                }
            }
        }
        public function logswitch($DB)
        {
            $data = [
                        'modal_title' => 'Log Switch',
                        'success_title'=>'Successfully clicked log switches',
                        'success_message'=>'Congratulations! '.$DB,
                        'close_link'=>'/flashrecoveryareas/fra'
                    ];

            $this->view('/modal/success', $data);
        }

    }