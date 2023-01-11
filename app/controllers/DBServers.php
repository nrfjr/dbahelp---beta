<?php

class DBServers extends Controller{

    public function __construct(){

        $this->dbserversModel = $this->model('DBServer');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }

    }

    public function show()
    {
        $DB = SIDS['DEFAULT'];

        $proddb = $this->dbserversModel->getDBServerList('PRD', $DB);
        $prodapps = $this->dbserversModel->getAppsServerList('PRD', $DB);
        $devdb = $this->dbserversModel->getDBServerList('DEV', $DB);
        $devapps = $this->dbserversModel->getAppsServerList('DEV', $DB);

        $data = [
            'proddb' => ($proddb) ? $proddb : [],
            'prodapps' => ($prodapps) ? $prodapps : [],
            'devdb' => ($devdb) ? $devdb : [],
            'devapps' => ($devapps) ? $devapps : []
        ];

        $this->view('dbservers/show', $data);
    }

}