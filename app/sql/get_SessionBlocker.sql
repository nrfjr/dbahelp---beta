SELECT SID,
			           serial# as SERIAL_NUM,
					   USERNAME,
                       OSUSER,
                       MACHINE 
                FROM   v$session
                WHERE sid IN (select sid
                              from v$lock
                              where block != 0
                              and type = 'TX')