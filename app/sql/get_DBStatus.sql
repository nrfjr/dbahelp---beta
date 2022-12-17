SELECT * FROM
(SELECT NAME AS "DB Name" FROM V$DATABASE),
(SELECT STATUS AS "DB Status" FROM V$INSTANCE),
(SELECT TO_CHAR(STARTUP_TIME, 'DD-MON-YY HH:MI:SS AM') AS "Start Time" FROM V$INSTANCE),
(SELECT     (CASE
            WHEN SUM(BYTES)/POWER(2,10) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,10),'fm999999') || ' KB'
            WHEN
            SUM(BYTES)/POWER(2,20) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,20),'fm999999') || ' MB'
            WHEN SUM(BYTES)/POWER(2,30) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR(SUM(BYTES)/POWER(2,40),'fm999999') || ' TB' 
            END) AS "Used SGA Size"
            FROM V$SGASTAT WHERE NAME != 'free memory'),
(SELECT     (CASE
            WHEN SUM(BYTES)/POWER(2,10) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,10),'fm999999') || ' KB'
            WHEN
            SUM(BYTES)/POWER(2,20) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,20),'fm999999') || ' MB'
            WHEN SUM(BYTES)/POWER(2,30) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR(SUM(BYTES)/POWER(2,40),'fm999999') || ' TB' 
            END) AS "Free SGA Size"
            FROM V$SGASTAT WHERE NAME = 'free memory'),
(SELECT     (CASE
            WHEN SUM(BYTES)/POWER(2,10) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,10),'fm999999') || ' KB'
            WHEN
            SUM(BYTES)/POWER(2,20) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,20),'fm999999') || ' MB'
            WHEN SUM(BYTES)/POWER(2,30) < 1024 THEN
            TO_CHAR(SUM(BYTES)/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR(SUM(BYTES)/POWER(2,40),'fm999999') || ' TB' 
            END) AS "Total SGA Size"
            FROM V$SGASTAT)