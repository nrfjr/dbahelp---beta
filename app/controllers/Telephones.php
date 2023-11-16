<?php

/***
 * 
 *      Telephonebook Controller 
 *      Created: December 16, 2022 (Not Exact)
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

class Telephones extends Controller{

    private $ContactSearch;

    public function __construct()
    {
        $this->telModel = $this->model('Telephone');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }

    }

    public function contacts()
    {
        $data = ['ContactSearch' => isset($_SESSION['ContactSearch']) ? $_SESSION['ContactSearch'] : ''];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['ContactSearch' => trim(empty($_POST['search']) ? '' : $_POST['search'])];
        }

        $_SESSION['ContactSearch'] = $data['ContactSearch'];

        if (isset($_SESSION['ContactSearch']) && $_SESSION['ContactSearch'] != null || $_SESSION['ContactSearch'] != '') {
            $this->ContactSearch = $_SESSION['ContactSearch'];
        }

        $result = $this->telModel->getContacts($this->ContactSearch);

        if ($result) {
            $data = $result;
        } else {
            $data = [];
        }

        $this->view('telephone/teldirectory', $data);
    }
}