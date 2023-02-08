SELECT (CASE
            when SGA_SIZE/POWER(2,10) < 1024 THEN
            TO_CHAR(SGA_SIZE/POWER(2,10),'fm999999') || ' GB'
            else
            TO_CHAR(SGA_SIZE/POWER(2,20),'fm999999') || ' TB' 
            END) AS "SGA Size",
        SGA_SIZE_FACTOR AS "Size Factor",
        ESTD_DB_TIME_FACTOR AS "Estd. DB Time Factor",
        ESTD_PHYSICAL_READS AS "Physical Reads"
FROM   
        V$SGA_TARGET_ADVICE
