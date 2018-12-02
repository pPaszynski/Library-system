<?php

require_once 'Parameters.php';

class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;


    public function __construct()
    {
        $this->servername = SERVERNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->dbname = DB_NAME;
    }

    public function connect()
    {
        try {
            return new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        }
        catch(PDOException $e)
        {
            return 'Connection failed: ' . $e->getMessage();
        }
    }
}