<?php

/***
 * 
 *      Performances Controller (Topbar Function) 
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
    public function dynacomp($DB)
    {
        $_SESSION['PerformanceDB'] = $DB;

        if (isset($_SESSION['PerformanceDB'])){
            $this->db = $_SESSION['PerformanceDB'];
        }

        $result = $this->performanceModel->getDynaComponents($this->db);

        if ($result){
            $data = $result;
        }else{
            $data = [];
        }

        $this->view('oracle/performance/dynacomp', $data);
    }
    
}