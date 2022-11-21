SELECT 

(CASE 
    WHEN (select host_name from v$instance where host_name like '%.kccmalls.com')IS NOT NULL THEN
    (select host_name from v$instance)
    ELSE
    CONCAT((select host_name from v$instance), '.kccmalls.com')
END) AS "Hostname",

UTL_INADDR.get_host_address AS "IP Address",

(select (CASE
            WHEN SUM(BYTES)/POWER(2,10) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,10),'fm999999') || ' KB'
            when
            SUM(BYTES)/POWER(2,20) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,20),'fm999999') || ' MB'
            when SUM(BYTES)/POWER(2,30) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,30),'fm999999') || ' GB'
            else
            TO_CHAR(SUM(BYTES)/POWER(2,40),'fm999999') || ' TB' 
            END) from v$datafile) AS "DB SIZE",

(select count(*) from v$session) AS "TOTAL",

(select count(*) from v$session where status = 'INACTIVE') AS "INACTIVE",

(select count(*) SYSTEM from v$session where username is null) AS "SYSTEM" FROM DUAL
