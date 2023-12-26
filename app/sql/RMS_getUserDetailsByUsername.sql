SELECT
                        FIRSTNAME AS "Firstname",
                        MIDDLENAMe AS "Middlename",
                        LASTNAME AS "Lastname",
                        ID AS "User Id",
                        APPLICATION AS "Application",
                        REQUESTOR AS "Requestor",
                        REMARKS AS "Remarks"
                    FROM 
                        (SELECT FIRSTNAME, MIDDLENAME, LASTNAME, ID FROM RMS13PRD.USER_ACCOUNTS WHERE USERNAME = (SELECT DISTINCT USERNAME FROM DBADMINS.USER_MASTER WHERE USERNAME = :USERNAME)),
                        (SELECT DISTINCT APPLICATION, REQUESTOR, REMARKS FROM DBADMINS.USER_MASTER WHERE USERNAME = :USERNAME) WHERE ROWNUM <=1