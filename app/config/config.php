<?php
    // DB Hosts
    define('RMS_HOST', '192.168.32.184');
    define('RDW_HOST', '192.168.32.198');
    define('OFIN_HOST', '192.168.34.8');
    define('SIM_HOST', '192.168.32.185');

    //DB Port
    define('DEFAULT_PORT', 1521);

    //DB Sid
    define('RMS_SID', 'RMSPRD');
    define('SIM_SID', 'SIMPRD');
    define('OFIN_SID', 'ERPP');
    define('RDW_SID', 'RDWPRD');

    //DB Admin Account
    define('ADMIN_USERNAME', 'dbadmins');
    define('ADMIN_PASSWORD', 'kccdba315');

    //DB System Account
    define('SYS_USERNAME1', 'system');
    define('SYS_PASSWORD1', 'manager');
    define('SYS_PASSWORD2', 'Oracleas1');

    //OFINPRD Account
    define('OFIN_USERNAME','apps');
    define('OFIN_PASSWORD','apps');

    //RDWPRD Account
    define('RDW_USERNAME','kcc_reports');
    define('RDW_PASSWORD','kccrdw');

    //SIM Account
    define('SIM_USERNAME','sim13prd');
    define('SIM_PASSWORD','sim13prd');

    //RMS Account
    define('RMS_USERNAME','rms13prd');
    define('RMS_PASSWORD','rmss13prd');
    

    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define('URLROOT', 'http://localhost/dbahelp');
    // Site Name
    define('SITENAME', 'DBAHelp');
    //Method Controller
    define('METHOD', '../app/method_controllers/');

    //ftp df file sites
    define('RMSPRD', 'ftp://oracle:0racleas1@192.168.32.184/home/oracle/dba_scripts/df.txt');
    define('RDWPRD', 'ftp://oracle:0racleas1@192.168.32.198/u01/oracle/dba_scripts/df.txt');
    define('SIMREIM', 'ftp://oracle:0racleas1@192.168.32.164/home/oracle/dba_scripts/df.txt');
    define('RPM', 'ftp://oracle:0racleas1@192.168.32.165/home/oracle/dba_scripts/df.txt');
    define('RMSOID', 'ftp://oracle:0racleas1@192.168.32.162/home/oracle/dba_scripts/df.txt');

    //NO FTP SITES!!!!!!!!!!!
    define('RMSUAT', 'ftp://oracle:0racleas1@192.168.32.101/home/oracle/dba_scripts/df.txt');
    define('OFIN', 'ftp://oraerpp:oraerpp@05:34:08@192.168.34.8/home/oracle/dba_scripts/df.txt');
    define('ERPP', 'ftp://oracle:0racleas1@192.168.32.44/u01/dba/scripts/df.txt');
    define('WMSPRD1', 'ftp://oracle:0racleas1@192.168.33.57/u01/dbascripts/df.txt');
    define('WMSPRD2', 'ftp://oracle:0racleas1@192.168.33.60/u01/dbascripts/df.txt');
    define('OBIEE1', 'ftp://oracle:0racleas1@192.168.32.114/home/oracle/dba/df.txt');
    define('OBIEE2', 'ftp://oracle:0racleas1@192.168.32.117/home/oracle/dba/df.txt');