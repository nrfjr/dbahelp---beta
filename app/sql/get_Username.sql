SELECT 
        DBA.USERNAME,
        UM.PASSWORD
FROM 
        DBA_USERS DBA, DBADMINS.USER_MASTER UM
WHERE 
        DBA.USERNAME (+)= UM.USERNAME
    AND
        UM.USERNAME = :username
    AND
        UM.DB_NAME = :db_name