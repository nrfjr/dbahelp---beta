<?php
class User
{
    private $db, $fm;

    public function __construct()
    {

        $this->fm = new FileManager;
    }

    //makes sure that username and password connect and exist in the database
    public function login($username, $password)
    {

        $this->db = new OracleDatabase('RMSPRD');

        $resultConnection = $this->db->test_connection($username, $password);
        $resultUsername = $this->getUsername($username, 'get_Username', 'RMSPRD');

        if ($resultConnection) {

            if ($resultUsername['USERNAME'] == $username) {
                $data = [
                    'username' => $username,
                    'password' => $password,
                    'firstname' => $resultUsername['FIRSTNAME']
                ];
                return [true, $data];
            }

        } else {
            return [false, 'Invalid username/password!, Please try again.'];
        }
    }

    public function getUsername($username, $query, $db)
    {
        $this->db = new OracleDatabase('RMSPRD');

        $query = $this->fm->loadSQL($query);
        $param = [
            'username' => $username,
            'db_name' => $db
        ];

        $this->db->queryWithParam($query, $param);

        $row = $this->db->single();

        if ($row) {
                return $row;
        } else {
            return false;
        }
    }

    //create user by provided username and password
    public function createUser($username, $password, $db)
    {

        $this->db = new OracleDatabase($db);

        $rms = $this->db->setProcedure('RMS_upsertToDBAUser(:username, :password)');
        $rdw = $this->db->setProcedure('RDW_upsertToDBAUser(:username, :password)');

        $query = $db == 'RMSPRD' ? $rms : $rdw;

        $param = [
            'username' => $username,
            'password' => $password
        ];
        
        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get user details specific to given id
    public function getUserDetails($id)
    {
        $this->db = new OracleDatabase('RMSPRD');
        $query = $this->fm->loadSQL('RMS_getUserDetails');
        $param = [
            'userid' => $id
        ];
        $this->db->queryWithParam($query, $param);

        $result = $this->db->single();

        if ($result) {
            return $result;
        }
        return false;
    }

    //gets userlist from usermaster 
    public function getUserList($search, $db)
    {
        $this->db = new OracleDatabase($db);
        $query = $this->fm->loadSQL('get_UserMasterList');
        $param = [
            'search' => $search
        ];
        $this->db->queryWithParam($query, $param);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function insertToUserMaster($data, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('upsertToUserMaster(:username, :password, :db_name, :app, :status, :requestor, :ip, :remarks)');

        $param = [
            'username' => $data['username'],
            'password' => $data['password'],
            'db_name' => $data['db_name'],
            'app' => $data['app'],
            'status' => 'ACTIVE',
            'requestor' => $data['requestor'],
            'ip' => $data['ip'],
            'remarks' => $data['remarks']
        ];

        $this->db->queryWithParam($query, $param);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertToUserAttrib($username, $db)
    {

        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('RMS_upsertToUserAttrib(:username)');

        $param = [
            'username' => $username
        ];

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertIntoIMUserAuth($data, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('RMS_upsertToIMUserAuth(:username, :password, :firstname, :lastname)');

        $param = [
            'username' => $data['username'],
            'password' => $data['password'],
            'firstname' => $data['fname'],
            'lastname' => $data['lname']
        ];

        $this->db->queryWithParam($query, $param);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertIntoBusinessRoleMember($username, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('RMS_upsertToIMBRoleMember(:username)');

        $param = [
            'username' => $username
        ];

        $this->db->queryWithParam($query, $param);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertToSecUserGroup($username, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('RMS_upsertToSecUserGroup(:username)');

        $param = [
            'username' => $username
        ];

        $this->db->queryWithParam($query, $param);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function grantSameAccess($ref_username, $username, $db)
    {
        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('grantSameAccess(:reference, :username)');

        $param = [
            'reference' => $ref_username,
            'username' => $username
        ];

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function insertToUserAccounts($data, $db)
    {

        $this->db = new OracleDatabase($db);

        $query = $this->db->setProcedure('RMS_upsertToUserAccounts(:id, :firstname, :middlename, :lastname, :password, :username, :status)');

        $param = [
            'id' => (int)$data['ID'],
            'firstname' => $data['fname'],
            'middlename' => $data['mname'],
            'lastname' => $data['lname'],
            'password' => $data['password'],
            'username' => $data['username'],
            'status' => 'ACTIVE'
        ];

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deactivateUser($username, $db)
    {
        $this->db = new OracleDatabase($db);

        $rms = $this->db->setProcedure('RMS_DeactivateUser(:username, :db_name)');
        $rdw = $this->db->setProcedure('RDW_DeactivateUser(:username, :db_name)');

        $query = $db == 'RMSPRD' ? $rms : $rdw;

        $param = [
            'username' => $username,
            'db_name' => $db
        ];

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function grantUserRole($username, $password, $db)
    {
        $this->db = new OracleDatabase($db);

        $rms = $this->db->setProcedure('RMS_grantUserPrivilege(:username, :password)');
        $rdw = $this->db->setProcedure('RDW_grantUserPrivilege(:username, :password)');

        $query = $db == 'RMSPRD'? $rms : $rdw;

        $param = [
            'username' => $username,
            'password' => $password
        ];

        $this->db->queryWithParam($query, $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
