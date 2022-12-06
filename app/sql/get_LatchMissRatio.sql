SELECT 	SUBSTR(L.NAME,1,30) AS "Latch Name", 
					ROUND((MISSES/(GETS+.001))*100,2)  "L Miss Ratio", 
					ROUND ((IMMEDIATE_MISSES/(IMMEDIATE_GETS+.001))*100,3) AS "Immediate Miss Ratio"
	      FROM 		V$LATCH L, V$LATCHNAME LN 
	      WHERE 	L.LATCH# = LN.LATCH# 
					AND ( 
							(MISSES/(GETS+.001))*100 > .2 
							OR 
							(IMMEDIATE_MISSES/(IMMEDIATE_GETS+.001))*100 > .2 
						) 
		  ORDER BY  L.NAME