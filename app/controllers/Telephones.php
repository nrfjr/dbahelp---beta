<?php

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