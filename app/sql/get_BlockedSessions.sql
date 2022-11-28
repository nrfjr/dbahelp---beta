SELECT /*+ ORDERED */
					   blocker.sid as BLOCKER_SID,
				       blocked.sid BLOCKED_SID,
                       TRUNC(blocked.ctime/60) MIN_BLOCKED,
                       blocked.request as REQUEST
				FROM  (select *
                       from v$lock
                       where block != 0
                       and type = 'TX') blocker,
                       v$lock blocked
                WHERE  blocked.type='TX'
                       and blocked.block = 0
                       and blocked.id1 = blocker.id1