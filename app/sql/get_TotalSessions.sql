SELECT COUNT(*) AS "Total Sessions" 
    FROM       
        v$session a,v$process b 
            WHERE      a.paddr = b.addr
                AND        a.username not in (:p1,:p2,:p3,:p4,:p5,:p6,:p7)
                AND     a.status = :status