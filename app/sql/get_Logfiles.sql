SELECT GROUP# AS "Group No.",
       MEMBER AS "Log File Location",
       TYPE AS "Log File Type",
       (CASE 
            WHEN STATUS = 'INVALID' THEN
                'Unable to access file.'
            WHEN STATUS = 'STALE' THEN
                'Incomplete file contents.'
            WHEN STATUS = 'DELETED' THEN
                'File has been removed.'
            ELSE
                'File is in use.'
        END) AS "File Status"
FROM V$LOGFILE ORDER BY GROUP#