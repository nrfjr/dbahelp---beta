<?php

class DBGrowth{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getGrowth($year)
    {
        $this->db = new OracleDatabase(SIDS['DEFAULT']);
        $query = $this->fm->loadSQL('get_DBGrowth');

        $param = [
                    'p_year' => $year
        ];

        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
		
        return [];
    }
	
	public function getMonthlyGrowthDiff($year){
		
		$this->db = new OracleDatabase(SIDS['DEFAULT']);
        $query = $this->fm->loadSQL('get_DBGrowthMonthlyDiff');

        $param = [
                    'p_year' => $year
        ];

        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }
		
        return [];
	}

}