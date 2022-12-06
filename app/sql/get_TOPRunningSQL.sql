SELECT
		sesion.sid AS "SID",
		sesion.serial# AS "Serial No.",
		process.spid AS "SPID",
		sesion.machine AS "Machine",
		sesion.username AS "Username",
		sesion.osuser AS "OS User",
		sesion.program AS "Program",
		TO_CHAR(TRUNC(cpu_time/3600000),'FM9900') || ':' ||
        TO_CHAR(TRUNC(MOD(cpu_time,3600000)/60000),'FM00') AS "CPU Time (HH:mm)",
		TO_CHAR(TRUNC(elapsed_time/3600000),'FM9900') || ':' ||
        TO_CHAR(TRUNC(MOD(elapsed_time,3600000)/60000),'FM00') "Elapsed Time (HH:mm)",
		Substr(sqlarea.sql_text,1,300) AS "SQLTEXT"
		FROM   	v$sqlarea sqlarea
				,v$session sesion
				,v$process process
		WHERE  	sesion.sql_hash_value = sqlarea.hash_value
				and sesion.sql_address = sqlarea.address
				and sesion.paddr = process.addr
				and sesion.username is not null
				AND ROWNUM < 20
		ORDER BY ELAPSED_TIME desc