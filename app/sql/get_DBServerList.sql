SELECT 
       ID,
       ROWNUM AS "Row No.",
       HOSTNAME AS "Hostname",
       IP_ADDR AS "IP Address",
       DB_VERSION AS "DB Version",
       OS,
       OS_UNAME AS "OS Username",
       OS_PWD AS "OS Password",
       AFFL AS "Affiliation"
FROM
       DBAHELP_DB_SERVERLIST
WHERE
       DB_CTY = :p_cty