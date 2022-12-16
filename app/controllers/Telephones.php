<?php

class Telephones extends Controller{

    public function __construct()
    {
        $this->telModel = $this->model('Telephone');

        if (!isset($_SESSION['username'])) {
            redirect('users/login');
        }

    }

    public function contacts()
    {
        $this->view('telephone/teldirectory', []);
    }
}