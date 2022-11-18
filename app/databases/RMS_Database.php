<?php
class RMS_Database
{

    private $RMS_Conn;
    private $stmt;
    private $error;

    private $count = 0;

    private $options;

    public function __construct()
    {

        $this->options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {

            $this->RMS_Conn = new PDO("oci:dbname=" . $this->getTNS(RMS_HOST, DEFAULT_PORT, RMS_SID) . ";charset=utf8", ADMIN_USERNAME, ADMIN_PASSWORD, $this->options);

        } catch (\Exception $e) {
            redirect('errors/void');
        }
    }
    public function test_connection($username, $password, $DB)
    {

        try {


                if ($this->RMS_Conn = new PDO("oci:dbname=" . $this->getTNS(RMS_HOST, DEFAULT_PORT, RMS_SID) . ";charset=utf8", $username, $password, $this->options)) {
                    return true;
                }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getTNS($server, $port, $sid)
    {
        return '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = ' . $server . ')(PORT = ' . $port . ')) (CONNECT_DATA = (SERVICE_NAME = ' . $sid . ') (SID = ' . $sid . ')))';
    }

    // Prepare statement with query
    public function query($sql)
    {
        $this->stmt = $this->RMS_Conn->prepare($sql);
    }
    // Prepare statement with query with parameters
    public function queryWithParam($sql, $param = [])
    {

        $this->stmt = $this->RMS_Conn->prepare($sql);

        foreach ($param as $bindTarget => $ParamValue) {
            $this->stmt->bindParam($bindTarget, $ParamValue);
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

    public function setFetch()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}