<?php

/***
 * 
 *      Objects Controller (Topbar Function) 
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

class Objects extends Controller{

    
    public function __construct(){
        $this->objectModel = $this->model('ObjectModel');

        if (!isset($_SESSION['username'])){
            redirect('users/login');
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