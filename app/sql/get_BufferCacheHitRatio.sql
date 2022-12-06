SELECT    SUM(DECODE(NAME, 'consistent gets' ,VALUE, 0)) AS "Consistent Gets",
					SUM(DECODE(NAME, 'db block gets',VALUE, 0)) AS "DB Block Gets",
					SUM(DECODE(NAME, 'physical reads' ,VALUE, 0)) AS "Physical Reads",
					ROUND (
                        (SUM(DECODE(NAME, 'consistent gets' ,VALUE, 0)) + SUM(DECODE(NAME, 'db block gets' ,VALUE, 0)) -  SUM(DECODE(NAME, 'physical reads' ,VALUE, 0))) / (SUM(DECODE(NAME, 'consistent gets' ,VALUE, 0)) + SUM(DECODE(NAME, 'db block gets' ,VALUE, 0))  )  * 100,2) AS "Hit Ratio"
		  FROM 		V$SYSSTAT