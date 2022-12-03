SELECT 			TO_CHAR(first_time, 'DD/MON' ) DAY,
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '07'  ,:A ,:B)) ,'000') AS "7AM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '08'  ,:A ,:B)) ,'000') AS "8AM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '09'  ,:A ,:B)) ,'000') AS "9AM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '10'  ,:A ,:B)) ,'000') AS "10AM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '11'  ,:A ,:B)) ,'000') AS "11AM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '12'  ,:A ,:B)) ,'000') AS "12NN",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '13'  ,:A ,:B)) ,'000') AS "1PM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '14'  ,:A ,:B)) ,'000') AS "2PM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '15'  ,:A ,:B)) ,'000') AS "3PM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '16'  ,:A ,:B)) ,'000') AS "4PM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '17'  ,:A ,:B)) ,'000') AS "5PM",
				TO_CHAR(sum (decode (TO_CHAR(first_time, 'HH24'), '18'  ,:A ,:B)) ,'000') AS "6PM"
		FROM    v$log_history
		WHERE   TRUNC(FIRST_TIME) > TRUNC(SYSDATE) - :p_week
				group by TO_CHAR(first_time, 'DD/MON' )
		ORDER BY DAY ASC