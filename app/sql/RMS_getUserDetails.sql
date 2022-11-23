SELECT
    firstname AS "Firstname",
    middlename AS "Middlename",
    lastname AS "Lastname",
    id AS "User Id",
    application AS "Application",
    requestor AS "Requestor",
    remarks AS "Remarks"
                    FROM 
                        (SELECT firstname, middlename, lastname, id FROM user_accounts where username = 
                            (SELECT username from dbadmins.user_master WHERE id = :userid)),
                        (SELECT application, requestor, remarks FROM dbadmins.user_master WHERE id = :userid)