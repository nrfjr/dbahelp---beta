SELECT    
        TRUNC(COMPLETION_TIME) AS "Date Generated",
        COUNT(*)  "Switch Count",
        ROUND((SUM(BLOCKS*BLOCK_SIZE)/1024/1024)) "Redo Log/s Per Day"
	FROM      
        V$ARCHIVED_LOG
	WHERE     
        TRUNC(COMPLETION_TIME) > SYSDATE-11
	GROUP BY  
        TRUNC(COMPLETION_TIME)
	ORDER BY  1 ASC