SELECT      (CASE WHEN
            (TABLESPACE_SIZE-FREE_SPACE)/POWER(2,10) < 1024 THEN
            TO_CHAR((TABLESPACE_SIZE-FREE_SPACE)/POWER(2,10),'fm999999') || ' KB'
            WHEN
            (TABLESPACE_SIZE-FREE_SPACE)/POWER(2,20) < 1024 THEN
            TO_CHAR((TABLESPACE_SIZE-FREE_SPACE)/POWER(2,20),'fm999999') || ' MB'
            WHEN (TABLESPACE_SIZE-FREE_SPACE)/POWER(2,30) < 1024 THEN
            TO_CHAR((TABLESPACE_SIZE-FREE_SPACE)/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR((TABLESPACE_SIZE-FREE_SPACE)/POWER(2,40),'fm999999') || ' TB'
            END) AS "TEMP USED",
				  (CASE WHEN
            FREE_SPACE/POWER(2,10) < 1024 THEN
            TO_CHAR(FREE_SPACE/POWER(2,10),'fm999999') || ' KB'
            WHEN
            FREE_SPACE/POWER(2,20) < 1024 THEN
            TO_CHAR(FREE_SPACE/POWER(2,20),'fm999999') || ' MB'
            WHEN FREE_SPACE/POWER(2,30) < 1024 THEN
            TO_CHAR(FREE_SPACE/POWER(2,30),'fm999999') || ' GB'
            ELSE
            TO_CHAR(FREE_SPACE/POWER(2,40),'fm999999') || ' TB'
            END) AS "TEMP FREE"
		   FROM   dba_temp_free_space