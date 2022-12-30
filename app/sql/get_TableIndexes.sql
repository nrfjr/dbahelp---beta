            SELECT      
                        IND.INDEX_NAME AS "Index Name",
					    IND.UNIQUENESS AS "Uniqueness",
						IND.PREFIX_LENGTH AS "Prefix Length",
						TAB.NUM_ROWS AS "Table Row CNT",
						IND.NUM_ROWS AS "Indexed Row CNT",
						IND.DISTINCT_KEYS "Distinct Key",
						IND.BLEVEL AS "Index Blocks Level",
						IND.LEAF_BLOCKS "Leaf Blocks",
						INC.COLUMN_NAME "Column Name",
						INC.DESCEND AS "Sort Order",
						(CASE 
						WHEN TBC.NULLABLE = 'Y' THEN 'Yes'
						ELSE 'No'
						END) AS "Nullable?",
						TBC.NUM_DISTINCT "Distinct Values CNT",
						TBC.NUM_NULLS "Null Values CNT",
						INX.COLUMN_EXPRESSION   "Column Expr."
			
			FROM        
						DBA_TABLES          TAB,
						DBA_INDEXES         IND,
						DBA_IND_COLUMNS     INC,
						DBA_TAB_COLS        TBC,
						DBA_IND_EXPRESSIONS INX
	WHERE       				
								TAB.OWNER    = :p_owner						
					    AND 	IND.TABLE_OWNER  = TAB.OWNER
						AND     IND.TABLE_NAME   = TAB.TABLE_NAME
						AND     INC.TABLE_OWNER  = IND.TABLE_OWNER
						AND     INC.TABLE_NAME   = IND.TABLE_NAME
						AND     INC.INDEX_OWNER  = IND.OWNER
						AND     INC.INDEX_NAME   = IND.INDEX_NAME
						AND     TBC.OWNER        = INC.TABLE_OWNER
						AND     TBC.TABLE_NAME   = INC.TABLE_NAME
						AND     TBC.COLUMN_NAME  = INC.COLUMN_NAME
						AND     INX.TABLE_OWNER(+)     = INC.TABLE_OWNER
						AND     INX.TABLE_NAME(+)      = INC.TABLE_NAME
						AND     INX.INDEX_OWNER(+)     = INC.INDEX_OWNER
						AND     INX.INDEX_NAME(+)      = INC.INDEX_NAME
						AND     INX.COLUMN_POSITION(+) = INC.COLUMN_POSITION
  
			ORDER BY	
						IND.INDEX_NAME,
						INC.COLUMN_POSITION