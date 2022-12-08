<?php

class FlashRecoveryArea{

    private $db, $fm;

    public function __construct(){
        $this->fm = new FileManager;
    }

    public function getFRA($db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->fm->loadSQL('get_FRA');

        $this->db->query($query);

        $result = $this->db->single();

        if (!empty($result)){

            $data = [
                'FRA Size' => $result['FRA SIZE'],
                'FRA Usage' => $result['FRA USAGE'],
                'FRA Percentage' => $result['FREE / USED'],
                'FRA Location' => $result['Location'],
                'FRA Reclaimable' => $result['Reclaimable']
            ];

            return $data;
        }
        return false;
    }

    public function resizeRFA($size, $db)
    {     
        $this->db = new OracleDatabase($db);  
        $query=$this->db->setProcedure('resizeRFA(:size)');
        $param = [
                     'size' => $size
                 ];
         $this->db->queryWithParam($query,$param);
 
         $result = $this->db->execute();
        
        if ($result){
             return true;
        }
 
        return false;
    }

}