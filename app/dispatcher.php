<?php
    // Load Config
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    // Load Databases
    require_once 'databases/RMS_Database.php';
    require_once 'databases/RDW_Database.php';
    require_once 'databases/OFIN_Database.php';

    // Load Misc
    require_once 'misc/Greeting.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libs/' .$className. '.php';
    });

