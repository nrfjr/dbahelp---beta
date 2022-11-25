<?php

class Performances extends Controller{

    
    public function __construct(){
        $this->performanceModel = $this->model('Performance');

        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }
    }

    public function pgatargetadvisor()
    {
        $this->view('performance/pgatargetadvisor',[]);
    }

    public function sgatargetadvisor()
    {
        $this->view('performance/sgatargetadvisor',[]);
    }

    public function buffercacheadvisor()
    {
        $this->view('performance/buffercacheadvisor',[]);
    }

    public function hitratio()
    {
        $this->view('performance/hitratio',[]);
    }

    public function tablestatistics()
    {
        $this->view('performance/tablestatistics',[]);
    }

    
}