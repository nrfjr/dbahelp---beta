SELECT T1."Database Name",
       SUM(JAN) AS JAN,
       SUM(FEB) AS FEB,
       SUM(MAR) AS MAR,
       SUM(APR) AS APR,
       SUM(MAY) AS MAY,
       SUM(JUN) AS JUN,
       SUM(JUL) AS JUL,
       SUM(AUG) AS AUG,
       SUM(SEP) AS SEP,
       SUM(OCT) AS OCT,
       SUM(NOV) AS NOV,
       SUM(DEC) AS DEC
  FROM (SELECT DISTINCT DECODE(LENGTH(IP),14,SUBSTR(IP, -6),13,SUBSTR(IP, -5),SUBSTR(IP, -4)) ||' - '|| DB_NAME AS "Database Name" FROM DATABASES_GROWTH_REPORT) T1
	  ,(SELECT DECODE(LENGTH(IP),14,SUBSTR(IP, -6),13,SUBSTR(IP, -5),SUBSTR(IP, -4)) ||' - '|| DB_NAME AS "Database Name",
            CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '1' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END JAN,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '2' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END FEB,
			            CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '3' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END MAR,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '4' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END APR,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '5' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END MAY,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '6' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END JUN,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '7' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END JUL,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '8' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END AUG,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '9' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END SEP,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '10' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END OCT,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '11' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END NOV,
                        CASE 
                WHEN EXTRACT(MONTH FROM REPORT_DATE) = '12' AND USED_SIZE > 0 THEN ((USED_SIZE - FREE_SIZE)/((SELECT SYSDATE FROM DUAL)-CREATION_DATE))*(SELECT LAST_DAY(TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM')) - TO_DATE(EXTRACT(MONTH FROM REPORT_DATE), 'MM') + 1 FROM DUAL) ELSE 0
            END DEC
		  FROM DATABASES_GROWTH_REPORT WHERE EXTRACT(YEAR FROM REPORT_DATE) = TO_NUMBER(:p_year)) T2
 WHERE T1."Database Name" = T2."Database Name"
GROUP BY T1."Database Name"
ORDER BY  T1."Database Name" ASC