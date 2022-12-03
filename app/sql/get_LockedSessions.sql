SELECT   /*+ ORDERED */
              ROWNUM AS "No.",
		l.sid AS SID,
		l.lmode AS "Lock Mode",
		TRUNC(l.ctime/ :p_time) AS "Minutes Blocked",
		u.name || '.' || o.NAME AS "Blocked Object"

	    FROM    (select *
                from   v$lock
                where  type = :p_type
                and    sid in (select sid
                              from   v$lock
                              where  block!=0)) l,
                                     sys.obj$ o,
                                     sys.user$ u
     
        WHERE   o.obj# = l.ID1
        AND     o.OWNER# = u.user#