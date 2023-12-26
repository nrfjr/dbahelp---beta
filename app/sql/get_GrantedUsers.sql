SELECT GRANTEE AS "Username",
       GRANTED_ROLE AS "Role",
	   ADMIN_OPTION AS "Admin Option",
	   DEFAULT_ROLE AS "Default Role"
FROM DBA_ROLE_PRIVS