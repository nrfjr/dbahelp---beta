SELECT      (CASE WHEN
            BYTES_USED/POWER(2,10) < 1024 THEN
            TO_CHAR(BYTES_USED/POWER(2,10),'fm999999') || ' KB'
            WHEN
            BYTES_USED/POWER(2,20) < 1024 THEN
            TO_CHAR(BYTES_USED/POWER(2,20),'fm999999') || ' MB'
            WHEN BYTES_USED/POWER(2,30) < 1024 THEN
            TO_CHAR(BYTES_USED/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR(BYTES_USED/POWER(2,40),'fm999999') || ' TB'
            END) AS "TEMP USED",
				  (CASE WHEN
            BYTES_FREE/POWER(2,10) < 1024 THEN
            TO_CHAR(BYTES_FREE/POWER(2,10),'fm999999') || ' KB'
            WHEN
            BYTES_FREE/POWER(2,20) < 1024 THEN
            TO_CHAR(BYTES_FREE/POWER(2,20),'fm999999') || ' MB'
            WHEN BYTES_FREE/POWER(2,30) < 1024 THEN
            TO_CHAR(BYTES_FREE/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR(BYTES_FREE/POWER(2,40),'fm999999') || ' TB'
            END) AS "TEMP FREE"
		   FROM   V$TEMP_SPACE_HEADER
		   WHERE  FILE_ID between 1 and 2