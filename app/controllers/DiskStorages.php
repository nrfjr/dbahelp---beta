<?php

class DiskStorages extends Controller{

    public function __construct(){

        $this->userModel = $this->model('DiskStorage');

    }

    public function diskstorage($host)
    {
        $data = [
                    'donut' => $this->getDF($this->getDFSource($host))
        ];
        $this->view('homepage/diskstorage', $data);
    }

    public function getDFSource($hostname)
    {
        if($hostname == 'RMSPRD'){
            return RMSPRD;
        }
        else if ($hostname == 'RDWPRD'){
            return RDWPRD;
        }
        else if ($hostname == 'ERPP'){
            return ERPP;
        }
        else if ($hostname == 'WMSPRD1'){
            return WMSPRD1;
        }
        else if ($hostname == 'WMSPRD2'){
            return WMSPRD2;
        }
        else if ($hostname == 'OBIEE1'){
            return OBIEE1;
        }
        else if ($hostname == 'OBIEE2'){
            return OBIEE2;
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

            $this->view('error/error', $data=['link' => '/disktorages/disktorage/null']);

        }
        catch( \Error $e ){

            $this->view('error/error', $data=['link' => '/disktorages/disktorage/null']);
            
        }
    }

}