                   
SELECT      
            b.TOTAL AS "FRA SIZE",
            b.USED AS "FRA USAGE",
			CONCAT(
                CONCAT(
                        (CASE WHEN a.PERCENT_USED> 100 THEN 0 ELSE (100-a.PERCENT_USED) END), ' / '), a.PERCENT_USED) AS "FREE / USED"
                        
                        
                                FROM (SELECT   
                                        (SUM(PERCENT_SPACE_USED)-SUM(PERCENT_SPACE_RECLAIMABLE)) PERCENT_USED
                                FROM     
                                    V$FLASH_RECOVERY_AREA_USAGE) a, 
                                    (SELECT
                            (CASE
            WHEN SPACE_LIMIT/POWER(2,10) < 1024 THEN
            TO_CHAR(SPACE_LIMIT/POWER(2,10),'fm999999') || ' KB'
            when
            SPACE_LIMIT/POWER(2,20) < 1024 THEN
            TO_CHAR(SPACE_LIMIT/POWER(2,20),'fm999999') || ' MB'
            when SPACE_LIMIT/POWER(2,30) < 1024 THEN
            TO_CHAR(SPACE_LIMIT/POWER(2,30),'fm999999') || ' GB'
            else
            TO_CHAR(SPACE_LIMIT/POWER(2,40),'fm999999') || ' TB' 
            END)AS "TOTAL",
                            (CASE
            WHEN SPACE_USED/POWER(2,10) < 1024 THEN
            TO_CHAR(SPACE_USED/POWER(2,10),'fm999999') || ' KB'
            when
            SPACE_USED/POWER(2,20) < 1024 THEN
            TO_CHAR(SPACE_USED/POWER(2,20),'fm999999') || ' MB'
            when SPACE_USED/POWER(2,30) < 1024 THEN
            TO_CHAR(SPACE_USED/POWER(2,30),'fm999999') || ' GB'
            else
            TO_CHAR(SPACE_USED/POWER(2,40),'fm999999') || ' TB' 
            END) AS "USED"
                   from     V$RECOVERY_FILE_DEST) b