          SELECT 	SUM(Gets) AS "Data Dictionary Gets", 
					SUM(GETMISSES) AS "Cache Misses", 
					TRUNC((1-(SUM(GETMISSES)/SUM(GETS)))*100) AS "Dictionary Hit Ratio" 
		  FROM      V$ROWCACHE