<?php

/***
 * 
 *      Flash Recovery Area (FRA) Controller 
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

class FlashRecoveryAreas extends Controller
{

    private $fraModel;

    public function __construct()
    {
        $this->fraModel = $this->model('FlashRecoveryArea');

        $this->dialog = $this->dialog('Dialog');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }
    }

    public function charts()
    {
        self::__construct();

        $data = [];

        foreach(array_keys(HOSTS) as $db){
            if($db != 'DEFAULT'){
                $data += [$db => $this->fraModel->getFRA($db)];
            }
        }

        $this->view('oracle/flashrecoveryarea/charts', $data);
    }

    public function resize()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            (int)$size = trim(SANITIZE_INPUT_STRING($_POST['size']));
            $db = trim($_POST['db']);
            $unit = trim(SANITIZE_INPUT_STRING($_POST['unit']));

            if (is_numeric($size)) {

                $result = $this->fraModel->resizeFRA($size.$unit, $db);

                if ($result == 1) {

                    $this->dialog->SUCCESS(
                        'FRA Resize',
                        'Resized Successfully',
                        $db . ' FRA resized by: ' . $size . ' '.$this->getUnit($unit),
                        '/flashrecoveryareas/charts'
                    );
                } else {
                    $this->dialog->FAILED(
                        'FRA Resize',
                        'Failed to Resized FRA',
                        $db . ' FRA resized by: ' . $size . ' '.$this->getUnit($unit).' failed.',
                        '/flashrecoveryareas/charts'
                    );
                }
            } else {
                $this->dialog->FAILED('FRA Resize', 'Resizing failed', 'Invalid size', '/flashrecoveryareas/charts');
            }
        }
    }

    public function getUnit($raw_unit)
    {
        if($raw_unit == 'g' || $raw_unit == 'G'){
            return 'GB';
        }else{
            return 'MB';
        }
    }
}
