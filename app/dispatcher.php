<?php
    /***
     *  I can't figure out why these files
     *  cannot be included in spl_autoload_register.
     *  For now, i'll be storing them in this un-spl_autoload_register
     *  array, in this way it is easy to include new files to be
     *  required_once. i'll be looking further for possible solution for this.
    ***/
    
    $UNSPLs = [
                'config/config.php',
                'helpers/url_helper.php',
                'helpers/session_helper.php',
                'helpers/tab_helper.php',
                'filters/sanitize.php',
                'misc/Greeting.php',
                'interfaces/DBInterface.php',
            ];

    foreach($UNSPLs as $UNSPL){
            require_once $UNSPL;
    }

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libs/' .$className. '.php';
    });