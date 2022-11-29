DECLARE
userexist INT
username1 VARCHAR(20) := :username
password1 VARCHAR(10) := :password
BEGIN

  SELECT count(*) INTO userexist FROM dba_users WHERE username = username1

  IF (userexist > 0) THEN
    EXECUTE IMMEDIATE 'ALTER USER ' || username1 || ' IDENTIFIED BY ' || password1 || ' DEFAULT TABLESPACE "DMTBDATA" '
  ELSE
    EXECUTE IMMEDIATE 'CREATE USER ' || username1 || ' IDENTIFIED BY ' || password1 || ' DEFAULT TABLESPACE "DMTBDATA" '
  END IF
END
/