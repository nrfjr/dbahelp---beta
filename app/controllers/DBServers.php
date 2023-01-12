<?php

class DBServers extends Controller{

    private $DB = SIDS['DEFAULT'];

    public function __construct(){

        $this->dbserversModel = $this->model('DBServer');
        $this->dialog = $this->dialog('Dialog');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }

    }

    public function show()
    {

        $proddb = $this->dbserversModel->getDBServerList('PRD', $this->DB);
        $prodapps = $this->dbserversModel->getAppsServerList('PRD', $this->DB);
        $devdb = $this->dbserversModel->getDBServerList('DEV', $this->DB);
        $devapps = $this->dbserversModel->getAppsServerList('DEV', $this->DB);

        $data = [
            'proddb' => ($proddb) ? $proddb : [],
            'prodapps' => ($prodapps) ? $prodapps : [],
            'devdb' => ($devdb) ? $devdb : [],
            'devapps' => ($devapps) ? $devapps : []
        ];

        $this->view('dbservers/show', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = trim($_POST['typedb']?$_POST['typedb']:$_POST['typeapp']);

            if ($type == 'DBS'){
                $data = [
                    'p_id' => (int)trim($_POST['iddb']?$_POST['iddb']:0),
                    'p_hostname' => trim($_POST['hostnamedb']),
                    'p_ip' => trim($_POST['ipaddressdb']),
                    'p_db_version' => trim($_POST['dbversiondb']),
                    'p_os' => trim($_POST['osdb']),
                    'p_uname' => trim($_POST['osunamedb']),
                    'p_pwd' => trim($_POST['ospassdb']),
                    'p_affl' => trim($_POST['affildb']),
                    'p_cty' => trim($_POST['dbtype'])
                ];
            }
            elseif ($type == 'APPS'){
                $data = [
                    'p_id' => (int)trim($_POST['idapp']?$_POST['idapp']:0),
                    'p_hostname' => trim($_POST['hostnameapp']),
                    'p_ip' => trim($_POST['ipaddressapp']),
                    'p_os' => trim($_POST['osapp']),
                    'p_uname' => trim($_POST['osunameapp']),
                    'p_pwd' => trim($_POST['ospassapp']),
                    'p_affl' => trim($_POST['affilapp']),
                    'p_url' => trim($_POST['appurlapp']),
                    'p_cty' => trim($_POST['apptype']),
                ];
            }
            ///print_r($data);
            $this->passDetailsToModel($data, $type);
        }
    }

    public function passDetailsToModel($data, $type)
    {
        if(!empty($data['p_hostname']) && !empty($data['p_ip'])){
            if($type == 'DBS'){
                $this->printCreateResult($this->dbserversModel->upsertDB($data, $this->DB), 'DB');
            }
            else{
                $this->printCreateResult($this->dbserversModel->upsertApps($data, $this->DB), 'APPS');
            }
        }
        else{
            $this->delete($data['p_id'], $type);
        }
    }

    public function printCreateResult($result, $type)
    {
        if($result){
            $this->dialog->SUCCESS($type.' Server List Information', $type.' details has been created/modified successfully', 'Details has been successfully appended to server records.', '/dbservers/show');
        }
        else{
            $this->dialog->FAILED($type.' Server List Information', $type . ' Creation/Modication failed', 'failed to append details to '.$type.' server records.', '/dbservers/show');
        }
    }

    public function delete($id, $type)
    {
        $result=$this->dbserversModel->delete($id, $type, $this->DB);

        if($result){
            $this->dialog->SUCCESS('Delete Information', $type.' details has been removed successfully', 'Details has been automatically removed from server records.', '/dbservers/show');
        }else{
            $this->dialog->FAILED('Delete Information', $type.' details deletion failed', 'failed to delete details from server records.', '/dbservers/show');
        }
    }

}