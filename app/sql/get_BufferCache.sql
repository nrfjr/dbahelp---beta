SELECT   SIZE_FOR_ESTIMATE AS "Estd. Size",
         SIZE_FACTOR AS "Size Factor",
         ESTD_PHYSICAL_READS AS "Estd. Physical Reads"
FROM     
         V$DB_CACHE_ADVICE