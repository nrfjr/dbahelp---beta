<?php

class DiskStorages extends Controller{

    public function __construct(){

        $this->disksModel = $this->model('DiskStorage');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }

    }

    public function show()
    {
        if(!isset($_SESSION['DiskStorageHost'])){
            $_SESSION['DiskStorageHost'] = 'DEFAULT';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $_SESSION['DiskStorageHost'] = trim(empty($_GET['host'])? '' : $_GET['host']);
        }

        $data = $this->getDF($this->setDFSource($_SESSION['DiskStorageHost']));
        $this->view('oracle/diskstorage/show', $data);
    }

    public function setDFSource($hostname)
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
        catch( \Exception|\Error|\Throwable|\TypeError $e ){

            $this->view('error/error', ['link' => '/disktorages/disktorage/default']);

        }
    }

}