<?php

class Performances extends Controller{

    private $db;
    
    public function __construct(){
        $this->performanceModel = $this->model('Performance');

        if (!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function pgatargetadvisor($DB)
    {
        $_SESSION['PerformanceDB'] = $DB;

        if (isset($_SESSION['PerformanceDB'])){
            $this->db = $_SESSION['PerformanceDB'];
        }

        $result = $this->performanceModel->getPGATarget($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('oracle/performance/pgatargetadvisor',$data);
    }

    public function sgatargetadvisor($DB)
    {
        $_SESSION['PerformanceDB'] = $DB;

        if (isset($_SESSION['PerformanceDB'])){
            $this->db = $_SESSION['PerformanceDB'];
        }

        $result = $this->performanceModel->getSGATarget($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('oracle/performance/sgatargetadvisor',$data);

    }

    public function buffercacheadvisor($DB)
    {
        $_SESSION['PerformanceDB'] = $DB;

        if (isset($_SESSION['PerformanceDB'])){
            $this->db = $_SESSION['PerformanceDB'];
        }

        $result = $this->performanceModel->getBufferCache($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('oracle/performance/buffercacheadvisor',$data);
    }

    public function hitratio($DB)
    {
        $_SESSION['PerformanceDB'] = $DB;

        if (isset($_SESSION['PerformanceDB'])){
            $this->db = $_SESSION['PerformanceDB'];
        }

        $buffer_hr = $this->performanceModel->getBufferCacheHR($this->db);
        $dictionary_hr = $this->performanceModel->getDictionaryHR($this->db);
        $library_mr = $this->performanceModel->getLibraryMR($this->db);
        $latch_mr = $this->performanceModel->getLatchMR($this->db);

        $data = [
                    'buffer' => ($buffer_hr)?$buffer_hr:[],
                    'dictionary' => ($dictionary_hr)?$dictionary_hr:[],
                    'library' => ($library_mr)?$library_mr:[],
                    'latch' => ($latch_mr)?$latch_mr:[]
                  ];
        
        $this->view('oracle/performance/hitratio', $data);
    }

    public function tablestatistics($DB)
    {

        $_SESSION['PerformanceDB'] = $DB;

        if (isset($_SESSION['PerformanceDB'])){
            $this->db = $_SESSION['PerformanceDB'];
        }

        $result = $this->performanceModel->getTableStatistics($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('oracle/performance/tablestatistics', $data);
    }
    
}