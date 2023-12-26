SELECT   
(CASE 
    WHEN wait_time.METRIC_VAL < 50 THEN
    '#12ff51,Good Performance'
    WHEN wait_time.METRIC_VAL BETWEEN 50 AND 70 THEN
    '#fae607,Average Performance'
    ELSE
    '#ff3c00,Bottleneck Performance'
END
) AS "DB STATUS"
		 FROM          (select  	     METRIC_NAME
										,round (VALUE) METRIC_VAL
		 			    from    	     SYS.V_$SYSMETRIC
		 			    where   	     METRIC_NAME = 'Database Wait Time Ratio'
		 			    AND              INTSIZE_CSEC = (select max(INTSIZE_CSEC) from SYS.V_$SYSMETRIC)) wait_time
						,
					   (select  	     METRIC_NAME
		 							    ,round (VALUE) METRIC_VAL
		 			    from    	     SYS.V_$SYSMETRIC
		 			    where   	     METRIC_NAME = 'Database CPU Time Ratio'
		 			    AND              INTSIZE_CSEC = (select max(INTSIZE_CSEC) from SYS.V_$SYSMETRIC)) cpu_time