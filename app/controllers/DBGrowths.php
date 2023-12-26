<?php

/***
 * 
 *      DBGrowth Controller 
 *      Created: October 4, 2022 (Not Exact)
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

class DBGrowths extends Controller{

	private $growthYear;

    public function __construct()
    {
        $this->growthModel = $this->model('DBGrowth');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }

    }

    public function show()
    {
		$_SESSION['GrowthYear'] = isset($_POST['year']) ? $_POST['year'] : date('Y');

        if (isset($_SESSION['GrowthYear']) && $_SESSION['GrowthYear'] != null || $_SESSION['GrowthYear'] != '') {
            $this->growthYear = $_SESSION['GrowthYear'];
        }

        $raw_growth = $this->growthModel->getGrowth($this->growthYear);
		$raw_diff = $this->growthModel->getMonthlyGrowthDiff($this->growthYear);
		
		$result_growth = []; $result_diff = [];
		
		foreach($raw_growth as $i => $j){
			$monthly_growth = [];
			foreach($j as $k => $v){
				if($k != 'Database Name'){
					$monthly_growth[] = $v;
				}
				$result_growth[$i] = ['name' => $j['Database Name'], 'data' => $monthly_growth];

			}
		}
		
		foreach($raw_diff as $i => $j){
			$monthly_diff = [];
			foreach($j as $k => $v){
				if($k != 'Database Name'){
					$monthly_diff[] = $v;
				}
				$result_diff[$i] = ['name' => $j['Database Name'], 'data' => $monthly_diff];

			}
		}
		
        $this->view('dbgrowth/show', ['Growth' => $result_growth, 'Diff' => $result_diff]);
    }
}