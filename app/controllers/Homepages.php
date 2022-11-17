<?php
    class Homepages extends Controller {
        public function __construct() {
            $this->homepageModel = $this->model('Homepage');

            if(!isset($_SESSION['username'])) {
                redirect('users/login');
            }
        }

        public function index() {

            $data = [
                        'Sessions' => [
                                        'RMSSessions' => $this->homepageModel->getSession()['RMSSession'],
                                        'RDWSessions' => $this->homepageModel->getSession()['RDWSession'],
                                        'OFINSessions' => $this->homepageModel->getSession()['OFINSession'],
                        ],
                        'FRA' =>[
                                        'RMS_FRA' => $this->homepageModel->getFRA()['RMS_FRA'],
                                        'RDW_FRA' => $this->homepageModel->getFRA()['RDW_FRA'],
                                        'OFIN_FRA' => $this->homepageModel->getFRA()['OFIN_FRA']
                        ],
                        'DB Status' => [
                                        'RMS_DBSTATUS' => $this->homepageModel->getDBStatus()['RMS_DBSTATUS'],
                                        'RDW_DBSTATUS' => $this->homepageModel->getDBStatus()['RDW_DBSTATUS'],
                                        'OFIN_DBSTATUS' => $this->homepageModel->getDBStatus()['OFIN_DBSTATUS']
                        ]

            ];
            
            $this->view('homepage/dashboard', $data);

        }


    }