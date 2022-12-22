<?php

class DiskStorages extends Controller{

    public function __construct(){

        $this->disksModel = $this->model('DiskStorage');

    }

    public function diskstorage($host)
    {
        $data = $this->getDF($this->getDFSource($host));
        $this->view('oracle/diskstorage/diskstorage', $data);
    }

    public function getDFSource($hostname)
    {
        if (in_array($hostname, array_keys(DISK))){
            return DISK[$hostname];
        }else{
            return DISK['DEFAULT'];
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