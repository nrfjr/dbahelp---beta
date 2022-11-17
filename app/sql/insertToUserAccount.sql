
INSERT INTO
    User_Accounts(
        Sequence,
        Id,
        Firstname,
        Middlename,
        Lastname,
        Password,
        Username,
        Status
        )VALUES(
        SEQ_ACCOUNTS.NEXTVAL,
        :id,
        :firstname,
        :middlename,
        :lastname,
        :password,
        :username,
        :status
        );

COMMIT;