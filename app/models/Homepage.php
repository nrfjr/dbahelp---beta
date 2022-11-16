<?php

    class Homepage{

        private $rmsdb,$rdwdb,$ofindb,$fm;

        public function __construct(){
            $this->rmsdb = new RMS_Database;
            $this->rdwdb = new RDW_Database;
            $this->ofindb = new OFIN_Database;
            $this->fm = new FileManager;


        }

        public function getRMS_Session()
        {
            $query = $this->fm->loadSQL('get_TotalSessions');
    
            $this->rmsdb->query($query);
    
            $result = $this->rmsdb->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }

        public function getRDW_Session()
        {
            $query = $this->fm->loadSQL('get_TotalSessions');
    
            $this->rdwdb->query($query);
    
            $result = $this->rdwdb->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }

        public function getOFIN_Session()
        {
            $query = $this->fm->loadSQL('get_TotalSessions');
    
            $this->ofindb->query($query);
    
            $result = $this->ofindb->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }

        public function getRMS_FRA()
        {
            $query = $this->fm->loadSQL('get_FRA');
    
            $this->rmsdb->query($query);
    
            $result = $this->rmsdb->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }

        public function getRDW_FRA()
        {
            $query = $this->fm->loadSQL('get_FRA');
    
            $this->rdwdb->query($query);
    
            $result = $this->rdwdb->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }

        public function getOFIN_FRA()
        {
            $query = $this->fm->loadSQL('get_FRA');
    
            $this->ofindb->query($query);
    
            $result = $this->ofindb->single();
    
            if(!empty($result)){
    
                return $result;
            }
            return false;
        }


    }