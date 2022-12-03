SELECT * FROM
		(SELECT sesion.sid SID,
				sesion.serial# SERIALNO,
				process.spid SPID,
				sesion.machine MACHINE,
				sesion.username USERNAME,
				sesion.osuser OSUSER,
				sesion.program PROGRAM,
				cpu_time CPUTIME,
				elapsed_time ELAPSEDTIME,
				Substr(sqlarea.sql_text,1,300) SQLTEXT
		FROM   	v$sqlarea sqlarea
				,v$session sesion
				,v$process process
		WHERE  	sesion.sql_hash_value = sqlarea.hash_value
				and sesion.sql_address = sqlarea.address
				and sesion.paddr = process.addr
				and sesion.username is not null
		ORDER BY ELAPSED_TIME desc)
		WHERE ROWNUM < 10