SELECT          
			CONCAT(CONCAT((
                SELECT 
                    CASE WHEN x.PERCENT_USED> 100 THEN 0 ELSE (100-x.PERCENT_USED) END
                        FROM             
                            (SELECT   (SUM(PERCENT_SPACE_USED)-SUM(PERCENT_SPACE_RECLAIMABLE)) PERCENT_USED
                                FROM     
                                    V$FLASH_RECOVERY_AREA_USAGE) x), ' / '),
		  (SELECT          
            x.PERCENT_USED
            FROM            
                (
                    SELECT   
                        (SUM(PERCENT_SPACE_USED)-SUM(PERCENT_SPACE_RECLAIMABLE)) PERCENT_USED
                           FROM     
                                V$FLASH_RECOVERY_AREA_USAGE) x)) AS "USED/FREE"
                                FROM DUAL