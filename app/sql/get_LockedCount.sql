SELECT 	count (*) AS "LOCK COUNT"
		FROM   	v$lock 
		WHERE  	block !=0 and type = :type