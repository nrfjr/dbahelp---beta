SELECT TABLE_NAME AS "Table Name",
       TABLESPACE_NAME AS "Tablespace Name", 
       TO_CHAR(LAST_ANALYZED, 'DD-MON-YYYY HH24:MI:SS AM') AS "Last Analyzed Date", 
       MONITORING AS "is Monitored?"
FROM 
       USER_TABLES