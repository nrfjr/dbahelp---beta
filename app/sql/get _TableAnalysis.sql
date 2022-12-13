SELECT	OWNER AS "Table Owner",
		sum(decode(nvl(NUM_ROWS,9999), 9999,0,1)) AS "Analyzed Tables Count",
		sum(decode(nvl(NUM_ROWS,9999), 9999,1,0)) AS "Not Analyzed Tables Count",
		count(TABLE_NAME) AS "Total Tables"
FROM 	:table
    GROUP BY OWNER