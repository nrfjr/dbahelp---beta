SELECT distinct a.username AS "Username", 
				   TO_CHAR(a.logon_Time, 'DD-MON-YYYY HH:MI:SS PM') AS "Login Date",
				   lpad(to_char(trunc(24*(sysdate-a.logon_time))) ||to_char(trunc(sysdate) + (sysdate-a.logon_time),':MI:SS'), 10, ' ') AS "Run Duration",
                   a.sid AS "SID",
				   a.serial# AS "Serial No.", 
				   a.osuser AS "OS User", 
				   b.spid AS "SPID",
				   a.program AS "Program Event"
		FROM       v$session a,
                   v$process b 
        WHERE      a.paddr = b.addr
		AND b.spid LIKE CONCAT(:search,'%')
        AND        a.username not in (:p1,:p2,:p3,:p4,:p5,:p6,:p7)
		ORDER BY a.username