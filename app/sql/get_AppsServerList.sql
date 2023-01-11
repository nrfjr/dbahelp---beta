SELECT
        ROWNUM AS "Row No.",
        HOSTNAME AS "Hostname",
        IP_ADDR AS "IP Address",
        OS,
        OS_UNAME AS "OS Username",
        OS_PWD AS "OS Password",
        AFFL AS "Affiliation",
        '<a href="'|| URL  ||'" target="_blank" title="click me to browse.">'|| URL || '</a>' AS "Application URL",
        REMARKS AS "Remarks"
FROM
        DBAHELP_APPS_SERVERLIST
WHERE
        APP_CTY = :p_cty