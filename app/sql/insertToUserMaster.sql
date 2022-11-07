INSERT INTO
USER_MASTER
    (
        id,
        username,
        password,
        db_name,
        application,
        date_created,
        status,
        requestor,
        created_by,
        remarks
        )VALUES(
        user_master_seq.nextval,
        :username,
        :password,
        :db_name,
        :application,
        sysdate,
        :status,
        :requestor,
        :created_by,
        :remarks
        );
        
COMMIT;