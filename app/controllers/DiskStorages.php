<?php

/***
 * 
 *      Disk Storage Controller 
 *      Created: December 15, 2022 (Not Exact)
 *      Created By: Nurfajar S. Sali
 * 
 *      This class contains methods that fetch data from
 *      Model class, these methods are also responsible on
 *      passing data to view, as these methods passes which
 *      views are appropriate for certain method calls along
 *      with necessary data.
 * 
 *      We made sure that methods are name after its purpose.
 *      So it is undestandable what are their process is all
 *      about.
 * 
 *      Comments are quite annoying if put in every line,
 *      whereas comments should be solid and intact but 
 *      informative as this for example.
 * 
 *      if there are confusing lines in the code below, you
 *      can email me at Gmail: nurfajarsali@gmail.com
 * 
 */

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

    /*** 
     *   getDF stands for get disk free, i dont know
     *   whats the history behind but this method is
     *   responsible for getting the size in our
     *   linux servers.
    ***/
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