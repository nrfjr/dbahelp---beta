<?php

class Objects extends Controller{

    
    public function __construct(){
        $this->objectModel = $this->model('ObjectModel');

        if (!isset($_SESSION['username'])){
            redirect('/users/login');
        }
    }

    public function invalidobjects($DB)
    {
        $_SESSION['ObjectDB'] = $DB;

        if (isset($_SESSION['ObjectDB'])){
            $this->db = $_SESSION['ObjectDB'];
        }

        $result = $this->objectModel->getInvalidObject($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }
        
        $this->view('oracle/object/invalidobjects',$data);
    }
    
}