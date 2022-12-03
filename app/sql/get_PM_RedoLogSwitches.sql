SELECT 			TO_CHAR(first_time, 'DD/MON' ) DAY,
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'19',:A,:B)),'000') AS "7PM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'20',:A,:B)),'000') AS "8PM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'21',:A,:B)),'000') AS "9PM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'22',:A,:B)),'000') AS "10PM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'23',:A,:B)),'000') AS "11PM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'00',:A,:B)),'000') AS "12NN",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'01',:A,:B)),'000') AS "1AM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'02',:A,:B)),'000') AS "2AM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'03',:A,:B)),'000') AS "3AM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'04',:A,:B)),'000') AS "4AM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'05',:A,:B)),'000') AS "5AM",
				TO_CHAR(sum(decode(TO_CHAR(first_time,'HH24'),'06',:A,:B)),'000') AS "6AM"
		FROM    v$log_history
		WHERE   TRUNC(FIRST_TIME) > TRUNC(SYSDATE) - :p_week
				group by TO_CHAR(first_time,'DD/MON') ORDER BY DAY ASC