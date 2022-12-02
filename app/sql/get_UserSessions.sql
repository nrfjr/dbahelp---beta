SELECT distinct a.username AS USERNAME, 
				   TO_CHAR(a.logon_Time, 'DD-MON-YYYY HH:MI:SS PM') AS LOGON_TIME,
				   lpad(to_char(trunc(24*(sysdate-a.logon_time))) ||to_char(trunc(sysdate) + (sysdate-a.logon_time),':MI:SS'), 10, ' ') AS RUN_TIME,
                   a.sid AS SID,
				   a.serial# AS SERIAL_NUM, 
				   a.osuser AS OSUSER, 
				   b.spid AS SYSPID,
				   a.program AS PROG_EVENT
		FROM       v$session a,
                   v$process b 
        WHERE      a.paddr = b.addr
		AND b.spid LIKE CONCAT(:search,'%')
        AND        a.username not in (:p1,:p2,:p3,:p4,:p5,:p6,:p7)
		ORDER BY USERNAME