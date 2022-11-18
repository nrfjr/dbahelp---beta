<?php

    class Homepage{

        private $rmsdb,$rdwdb,$ofindb,$fm;

        public function __construct(){
            $this->rmsdb = new RMS_Database;
            $this->rdwdb = new RDW_Database;
            $this->ofindb = new OFIN_Database;
            $this->fm = new FileManager;


        }

        public function getSession()
        {
            $query = $this->fm->loadSQL('get_TotalSessions');

            $this->rmsdb->query($query);

            $this->rdwdb->query($query);

            $this->ofindb->query($query);

            $result_rms = $this->rmsdb->single();
            $result_rdw = $this->rdwdb->single();
            $result_ofin = $this->ofindb->single();

            if(!empty($result_rms)&&!empty($result_rms)&&!empty($result_rms)){

                $data = [
                    'RMSSession' => $result_rms['Total Sessions'],
                    'RDWSession' => $result_rdw['Total Sessions'],
                    'OFINSession' => $result_ofin['Total Sessions']
                ];

                return $data;
            }
            return false;
        }

        public function getFRA()
        {
            $query = $this->fm->loadSQL('get_FRA');

            $this->rmsdb->query($query);
            $this->rdwdb->query($query);
            $this->ofindb->query($query);

            $result_rms = $this->rmsdb->single();
            $result_rdw = $this->rdwdb->single();
            $result_ofin = $this->ofindb->single();

            if(!empty($result_rms)&&!empty($result_rms)&&!empty($result_rms)){

                $data = [
                    'RMS_FRA' => $result_rms['USED/FREE'],
                    'RDW_FRA' => $result_rdw['USED/FREE'],
                    'OFIN_FRA' => $result_ofin['USED/FREE']
                ];

                return $data;
            }
            return false;
        }

        public function getDBStatus()
        {
            $query = $this->fm->loadSQL('get_DBStatus');

            $this->rmsdb->query($query);
            $this->rdwdb->query($query);
            $this->ofindb->query($query);

            $result_rms = $this->rmsdb->single();
            $result_rdw = $this->rdwdb->single();
            $result_ofin = $this->ofindb->single();

            if(!empty($result_rms)&&!empty($result_rms)&&!empty($result_rms)){

                $data = [
                    'RMS_DBSTATUS' => $result_rms['DB STATUS'],
                    'RDW_DBSTATUS' => $result_rdw['DB STATUS'],
                    'OFIN_DBSTATUS' => $result_ofin['DB STATUS']
                ];

                return $data;
            }
            return false;
        }


    }