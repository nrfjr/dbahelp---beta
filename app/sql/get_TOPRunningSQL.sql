SELECT * FROM
		(SELECT
        ROWNUM AS "No.",
		sesion.sid AS "SID",
		sesion.serial# AS "Serial No.",
		process.spid AS "SPID",
		sesion.machine AS "Machine",
		sesion.username AS "Username",
		sesion.osuser AS "OS User",
		sesion.program AS "Program",
		cpu_time AS "CPU Time",
		elapsed_time "Elapsed Time",
		Substr(sqlarea.sql_text,1,300) AS "SQLTEXT"
		FROM   	v$sqlarea sqlarea
				,v$session sesion
				,v$process process
		WHERE  	sesion.sql_hash_value = sqlarea.hash_value
				and sesion.sql_address = sqlarea.address
				and sesion.paddr = process.addr
				and sesion.username is not null
		ORDER BY ELAPSED_TIME desc)
		WHERE ROWNUM < 10