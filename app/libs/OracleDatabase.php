<?php
class OracleDatabase implements DBInterface
{

    private $conn;
    private $stmt;
    private $error;

    private $count = 0;

    public function __construct($DB)
    {

        $this->conn = $this->getConnection($DB);
    }

    public function getConnection($dbname)
    {

        try {

            if (in_array($dbname, array_keys(HOSTS))){
                return new PDO("oci:dbname=" . $this->getTNS(HOSTS[$dbname], DEFAULT_PORT, SIDS[$dbname]) . ";charset=utf8", ADMIN_USERNAME, ADMIN_PASSWORD, $this->getOption());
            }else{
                return new PDO("oci:dbname=" . $this->getTNS(HOSTS['DEFAULT'], DEFAULT_PORT, SIDS['DEFAULT']) . ";charset=utf8", ADMIN_USERNAME, ADMIN_PASSWORD, $this->getOption());
            }
            
        } catch (PDOException $e) {

           echo $e->getMessage();
        }
    }

    public function getTNS($server, $port, $sid)
    {
        $TNS =  '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = ' . $server . ')(PORT = ' . $port . ')) (CONNECT_DATA = (SERVICE_NAME = ' . $sid . ') (SID = ' . $sid . ')))';
        return $TNS;
    }

    public function getOption()
    {
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        return $option;
    }

    public function test_connection($username, $password)
    {

        try {

            if (new PDO("oci:dbname=" . $this->getTNS(HOSTS['DEFAULT'], DEFAULT_PORT, 'RMSPRD') . ";charset=utf8", $username, $password, $this->getOption())) {
                return true;
            }
            return false;
        } catch (\Exception $e) {

            return false;
        }
    }

    // Prepare statement with query
    public function query($sql)
    {
            $this->stmt = $this->conn->prepare($sql);
    }
    // Prepare statement with query and parameters
    public function queryWithParam($sql, $param = [])
    {
            $this->stmt = $this->conn->prepare($sql);

            foreach ($param as $bindTarget => $ParamValue) {

                if (is_int($ParamValue)) {
                    $this->stmt->bindValue($bindTarget, $param[$bindTarget]);
                } else {
                    $this->stmt->bindValue($bindTarget, $ParamValue);
                }
            }
    }
    // Execute the prepared statement
    public function execute()
    {
            return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet()
    {

        $this->execute();

        return $this->stmt->fetchAll();
    }

    // Get single record as object
    public function single()
    {

        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get row count
    // public function rowCount(){

    //     return $this->stmt->rowCount();

    // }

    public function setProcedure($procedure)
    {
        return 'BEGIN ' . $procedure . '; END;';
    }
}
