SELECT  OWNER AS "Owner",
        OBJECT_NAME AS "Object Name",
        OBJECT_TYPE AS "Object Type",
        TO_CHAR(TO_TIMESTAMP(TIMESTAMP,'YYYY-MM-DD HH24:MI:SS'), 'DD-MON-YYYY HH24:MI:SS AM' ) AS "Date Created" 
FROM   
        ALL_OBJECTS 
WHERE   
        STATUS = 'INVALID'