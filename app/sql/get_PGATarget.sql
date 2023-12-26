SELECT 	(CASE
            WHEN PGA_TARGET_FOR_ESTIMATE/POWER(2,10) < 1024 THEN
            TO_CHAR(PGA_TARGET_FOR_ESTIMATE/POWER(2,10),'fm999999') || ' KB'
            when
            PGA_TARGET_FOR_ESTIMATE/POWER(2,20) < 1024 THEN
            TO_CHAR(PGA_TARGET_FOR_ESTIMATE/POWER(2,20),'fm999999') || ' MB'
            when PGA_TARGET_FOR_ESTIMATE/POWER(2,30) < 1024 THEN
            TO_CHAR(PGA_TARGET_FOR_ESTIMATE/POWER(2,30),'fm999999') || ' GB'
            else
            TO_CHAR(PGA_TARGET_FOR_ESTIMATE/POWER(2,40),'fm999999') || ' TB' 
            END) AS "Target Estimate",
		PGA_TARGET_FACTOR AS "Target Factor",
		(CASE
            WHEN BYTES_PROCESSED/POWER(2,10) < 1024 THEN
            TO_CHAR(BYTES_PROCESSED/POWER(2,10),'fm999999') || ' KB'
            when
            BYTES_PROCESSED/POWER(2,20) < 1024 THEN
            TO_CHAR(BYTES_PROCESSED/POWER(2,20),'fm999999') || ' MB'
            when BYTES_PROCESSED/POWER(2,30) < 1024 THEN
            TO_CHAR(BYTES_PROCESSED/POWER(2,30),'fm999999') || ' GB'
            else
            TO_CHAR(BYTES_PROCESSED/POWER(2,40),'fm999999') || ' TB' 
            END) AS "Processed Size",
		(CASE
            WHEN ESTD_EXTRA_BYTES_RW/POWER(2,10) < 1024 THEN
            TO_CHAR(ESTD_EXTRA_BYTES_RW/POWER(2,10),'fm999999') || ' KB'
            when
            ESTD_EXTRA_BYTES_RW/POWER(2,20) < 1024 THEN
            TO_CHAR(ESTD_EXTRA_BYTES_RW/POWER(2,20),'fm999999') || ' MB'
            when ESTD_EXTRA_BYTES_RW/POWER(2,30) < 1024 THEN
            TO_CHAR(ESTD_EXTRA_BYTES_RW/POWER(2,30),'fm999999') || ' GB'
            else
            TO_CHAR(ESTD_EXTRA_BYTES_RW/POWER(2,40),'fm999999') || ' TB' 
            END) AS "Estd. No. of Extra Bytes",
        ESTD_PGA_CACHE_HIT_PERCENTAGE AS "Hit Cache"  
	FROM
        V$PGA_TARGET_ADVICE