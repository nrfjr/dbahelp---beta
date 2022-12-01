<?php

class DiskStorages extends Controller{

    public function __construct(){

        $this->disksModel = $this->model('DiskStorage');

    }

    public function diskstorage($host)
    {
        $data = [
                    'df' => $this->getDF($this->getDFSource($host))
        ];
        $this->view('diskstorage/diskstorage', $data);
    }

    public function getDFSource($hostname)
    {
        if($hostname == 'RMSPRD'){
            return RMSPRD;
        }
        else if ($hostname == 'RDWPRD'){
            return RDWPRD;
        }
        else if ($hostname == 'SIMREIM'){
            return SIMREIM;
        }
        else if ($hostname == 'RPM'){
            return RPM;
        }
        else if ($hostname == 'RMSOID'){
            return RMSOID;
        }
        else{
            return RMSPRD;
        }
    }

    public function getDF($FTP_DIR_WITH_FILE)       
    {
        try{

        $filename = $FTP_DIR_WITH_FILE;
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        return json_decode($contents, true);
        }
        catch( \Exception $e ){

            $this->view('error/error', $data=['link' => '/disktorages/disktorage/default']);

        }
        catch( \Error $e ){

            $this->view('error/error', $data=['link' => '/disktorages/disktorage/default']);
            
        }
    }

}