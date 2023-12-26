<?php

    // Autoload All Necessary Files and Libraries
    spl_autoload_register(function($className) {

        $fileMap = [
            'Greeting' => 'misc/Greeting.php',
            'DBInterface' => 'interfaces/DBInterface.php',
            'config' => 'config/config.php',
            'Helper' => 'helpers/Helper.php',
            'sanitize' => 'filters/sanitize.php'
        ];
    
        if ($fileMap){
            foreach($fileMap as $k => $v){
                require_once $v;
            }
        }

        require_once 'libs/' . $className . '.php';

    });