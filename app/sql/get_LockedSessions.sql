SELECT   /*+ ORDERED */
			    l.sid as SID,
			    l.lmode as LOCK_MODE,
			    TRUNC(l.ctime/ 60) MIN_BLOCKED,
			    u.name||'.'||o.NAME BLOCKED_OBJ

	    FROM    (select *
                from   v$lock
                where  type = 'TM'
                and    sid in (select sid
                              from   v$lock
                              where  block!=0)) l,
                                     sys.obj$ o,
                                     sys.user$ u
     
        WHERE   o.obj# = l.ID1
        AND     o.OWNER# = u.user#