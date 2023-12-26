          SELECT 	SUM(PINS) AS "Executions", 
                    SUM(RELOADS) AS "Cache Miss", 
					ROUND ((((SUM(RELOADS)/SUM(PINS)))),4) AS "Miss Ratio"
		  FROM      V$LIBRARYCACHE