INSERT INTO 
    USER_ATTRIB(
        user_id,
        user_name, 
        lang, 
        store_default, 
        user_phone, 
        user_fax, 
        user_pager, 
        user_email, 
        default_printer
        )VALUES(
        :username, 
        :username, 
        1, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL
        );
COMMIT;