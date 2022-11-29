DECLARE
userexist INT
username1 VARCHAR(20) := :username
password1 VARCHAR(10) := :password
BEGIN

  SELECT count(*) INTO userexist FROM dba_users WHERE username = username1

  IF (userexist > 0) THEN
    EXECUTE IMMEDIATE 'ALTER USER ' || username1 || ' DEFAULT TABLESPACE RETEK_DATA IDENTIFIED BY ' || password1
  ELSE
    EXECUTE IMMEDIATE 'CREATE USER ' || username1 || ' DEFAULT TABLESPACE RETEK_DATA IDENTIFIED BY ' || password1 
  END IF
END
/