SELECT 	
        LOCATION AS "Location",
		LOCAL AS "Telephone No.",
		DEPARTMENT AS "Department",
		PERSONS AS "Contact Person/s"
FROM 	
        TELDIRECTORY 
WHERE 
        LOCATION LIKE CONCAT(:search,'%')
		OR LOCAL LIKE CONCAT(:search,'%')
		OR DEPARTMENT LIKE CONCAT(:search,'%')