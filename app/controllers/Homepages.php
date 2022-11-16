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
                                        'RMSSessions' => $this->getRMSSessions(),
                                        'RDWSessions' => $this->getRDWSessions(),
                                        'OFINSessions' => $this->getOFINSessions(),
                        ],
                        'FRA' =>[
                                        'RMS_FRA' => $this->getRMS_FRAs(),
                                        'RDW_FRA' => $this->getRDW_FRAs(),
                                        'OFIN_FRA' => $this->getOFIN_FRAs()
                        ]
            ];
            
            $this->view('homepage/dashboard', $data);

        }

        public function getRMSSessions(){

            return  $this->homepageModel->getRMS_Session()['Total Sessions'];
            
        }
        public function getRDWSessions()        
        {
            return  $this->homepageModel->getRDW_Session()['Total Sessions'];
        }
        public function getOFINSessions()        
        {
            return  $this->homepageModel->getOFIN_Session()['Total Sessions'];
        }
        public function getRMS_FRAs()    
        {
            return  $this->homepageModel->getRMS_FRA()['USED/FREE'];
        }
        public function getRDW_FRAs()    
        {
            return  $this->homepageModel->getRDW_FRA()['USED/FREE'];
        }
        public function getOFIN_FRAs()    
        {
            return  $this->homepageModel->getOFIN_FRA()['USED/FREE'];
        }


    }