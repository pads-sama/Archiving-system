<?php

class DatabaseConnection
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ojt-app";

    public function dbConnection()
    {
        try {
            $databaseConn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            return $databaseConn;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
