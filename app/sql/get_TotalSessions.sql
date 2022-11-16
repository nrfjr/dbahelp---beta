SELECT COUNT(*) AS "Total Sessions" 
    FROM       
        v$session a,v$process b 
            WHERE      a.paddr = b.addr
                AND        a.username not in ('SYSMAN','TAFRHOSP','DBSNMP','APEX_PUBLIC_USER','ALLOC13PRD','SYS','SYSTEM')