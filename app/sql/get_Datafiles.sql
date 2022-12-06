SELECT  ROWNUM AS "Row No.", 
        FILE_ID AS "File ID",
        TABLESPACE_NAME AS "Tablespace Name",
        FILE_NAME AS "Datafile Location",
        STATUS AS "Status"
FROM(
    SELECT 
        FILE_ID,
        TABLESPACE_NAME,
        FILE_NAME,
        STATUS
    FROM 
        SYS.DBA_DATA_FILES
    ORDER BY 
        TABLESPACE_NAME) 
ORDER BY 
    ROWNUM