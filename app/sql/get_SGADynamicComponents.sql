SELECT 	COMPONENT AS "SGA Component",
        (CASE
        WHEN CURRENT_SIZE/POWER(2,10) < 1024 THEN
        TO_CHAR(CURRENT_SIZE/POWER(2,10),'fm999999') || ' KB'
        when
        CURRENT_SIZE/POWER(2,20) < 1024 THEN
        TO_CHAR(CURRENT_SIZE/POWER(2,20),'fm999999') || ' MB'
        when CURRENT_SIZE/POWER(2,30) < 1024 THEN
        TO_CHAR(CURRENT_SIZE/POWER(2,30),'fm999999') || ' GB'
        else
        TO_CHAR(CURRENT_SIZE/POWER(2,40),'fm999999') || ' TB' 
        END) AS "Current Size", 
        (CASE
        WHEN USER_SPECIFIED_SIZE/POWER(2,10) < 1024 THEN
        TO_CHAR(USER_SPECIFIED_SIZE/POWER(2,10),'fm999999') || ' KB'
        when
        USER_SPECIFIED_SIZE/POWER(2,20) < 1024 THEN
        TO_CHAR(USER_SPECIFIED_SIZE/POWER(2,20),'fm999999') || ' MB'
        when USER_SPECIFIED_SIZE/POWER(2,30) < 1024 THEN
        TO_CHAR(USER_SPECIFIED_SIZE/POWER(2,30),'fm999999') || ' GB'
        else
        TO_CHAR(USER_SPECIFIED_SIZE/POWER(2,40),'fm999999') || ' TB' 
        END) AS "User Specified Size",
        LAST_OPER_TYPE AS "Last Operation Type",
        (CASE
        WHEN GRANULE_SIZE/POWER(2,10) < 1024 THEN
        TO_CHAR(GRANULE_SIZE/POWER(2,10),'fm999999') || ' KB'
        when
        GRANULE_SIZE/POWER(2,20) < 1024 THEN
        TO_CHAR(GRANULE_SIZE/POWER(2,20),'fm999999') || ' MB'
        when GRANULE_SIZE/POWER(2,30) < 1024 THEN
        TO_CHAR(GRANULE_SIZE/POWER(2,30),'fm999999') || ' GB'
        else
        TO_CHAR(GRANULE_SIZE/POWER(2,40),'fm999999') || ' TB' 
        END) AS "Granule Size"
		FROM V$SGA_DYNAMIC_COMPONENTS