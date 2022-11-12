<?php

require_once '../app/models/RMS_Session.php';


    function getSessions(){

        $sessionModel = new RMS_Session();

        echo $sessionModel->getSession()['Total Sessions'];

    }
    
?>
