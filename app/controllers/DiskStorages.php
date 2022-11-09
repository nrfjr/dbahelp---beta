<?php

class DiskStorages extends Controller{

    public function __construct(){

        $this->userModel = $this->model('DiskStorage');

    }

    public function diskstorage()
    {
        $data = [
                    'donut' => $this->getDF(RMSPRD)
        ];
        $this->view('homepage/diskstorage', $data);
    }

    public function getDF($FTP_DIR_WITH_FILE)       
    {
        $filename = $FTP_DIR_WITH_FILE;
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        return json_decode($contents, true);
    }

}