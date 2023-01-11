SELECT 
       ROWNUM AS "Row No.",
       ID AS "DB Id.",
       HOSTNAME AS "Hostname",
       IP_ADDR AS "IP Address",
       DB_VERSION AS "DB Version",
       OS,
       OS_UNAME AS "OS Username",
       OS_PWD AS "OS Password",
       AFFL AS "Affiliation",
       REMARKS AS "Remarks"
FROM
       DBAHELP_DB_SERVERLIST
WHERE
       DB_CTY = :p_cty