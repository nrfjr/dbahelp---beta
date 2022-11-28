SELECT     distinct a.username as USERNAME, 
				   TO_CHAR(a.logon_Time, 'DD-MON-YYYY HH:MI:SS PM') as LOGON_TIME,
				   lpad(to_char(trunc(24*(sysdate-a.logon_time))) ||to_char(trunc(sysdate) + (sysdate-a.logon_time),':MI:SS'), 10, ' ') as RUN_TIME,
                   a.sid as SID,
				   a.serial# as SERIAL_NUM, 
				   a.osuser as OSUSER, 
				   b.spid as SYSPID,
				   a.program as PROG_EVENT
		FROM       v$session a,
                   v$process b 
        WHERE      a.paddr = b.addr
        AND        a.username not in ('SYSMAN','TAFRHOSP','DBSNMP','APEX_PUBLIC_USER','ALLOC13PRD','SYS','SYSTEM')
		ORDER BY USERNAME