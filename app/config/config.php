<?php
    // DB Params
    define('DB_SERVER', '192.168.32.101');
    define('PORT', 1521);

    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define('URLROOT', 'http://localhost/dbahelp');
    // Site Name
    define('SITENAME', 'DBAHelp');

    //ftp df file sites
    define('RMSPRD', 'ftp://oracle:0racleas1@192.168.32.184/home/oracle/dba_scripts/df.txt');
    define('RDWPRD', 'ftp://oracle:0racleas1@192.168.32.198/u01/oracle/dba_scripts/df.txt');
    define('SIMREIM', 'ftp://oracle:0racleas1@192.168.32.164/home/oracle/dba_scripts/df.txt');
    define('RPM', 'ftp://oracle:0racleas1@192.168.32.165/home/oracle/dba_scripts/df.txt');
    define('RMSOID', 'ftp://oracle:0racleas1@192.168.32.162/home/oracle/dba_scripts/df.txt');

    //NO FTP!!!!!!!!!!!
    define('RMSUAT', 'ftp://oracle:0racleas1@192.168.32.101/home/oracle/dba_scripts/df.txt');
    define('OFIN', 'ftp://oraerpp:oraerpp@05:34:08@192.168.34.8/home/oracle/dba_scripts/df.txt');
    define('ERPP', 'ftp://oracle:0racleas1@192.168.32.44/u01/dba/scripts/df.txt');
    define('WMSPRD1', 'ftp://oracle:0racleas1@192.168.33.57/u01/dbascripts/df.txt');
    define('WMSPRD2', 'ftp://oracle:0racleas1@192.168.33.60/u01/dbascripts/df.txt');
    define('OBIEE1', 'ftp://oracle:0racleas1@192.168.32.114/home/oracle/dba/df.txt');
    define('OBIEE2', 'ftp://oracle:0racleas1@192.168.32.117/home/oracle/dba/df.txt');