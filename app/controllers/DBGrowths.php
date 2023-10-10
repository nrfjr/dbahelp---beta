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
		$data = ['GrowthYear' => isset($_SESSION['GrowthYear']) ? $_SESSION['GrowthYear'] : ''];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['GrowthYear' => trim(empty($_POST['year']) ? date('Y') : $_POST['year'])];
        }

        $_SESSION['GrowthYear'] = $data['GrowthYear'];

        if (isset($_SESSION['GrowthYear']) && $_SESSION['GrowthYear'] != null || $_SESSION['GrowthYear'] != '') {
            $this->growthYear = $_SESSION['GrowthYear'];
        }

        $raw_data = $this->growthModel->getGrowth($this->growthYear);
		
		$result = [];
		
		foreach($raw_data as $i => $j){
			$monthly_growth = [];
			foreach($j as $k => $v){
				if($k != 'Database Name'){
					$monthly_growth[] = $v;
				}
				$result[$i] = ['name' => $j['Database Name'], 'data' => $monthly_growth];

			}
		}
		
        $this->view('dbgrowth/show', $result);
    }
}