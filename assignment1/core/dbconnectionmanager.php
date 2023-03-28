<?php

namespace database;

class DBConnectionManager
{
    private $username;
    private $password;
    private $server;
    private $dbname;
    private $dbconnection;

    //$this means this class' properties and methods that we are accessing
    function __construct()
    {
        $this->username = 'root';
        $this->password = '';
        $this->server = 'localhost';
        $this->dbname = 'assignment1';

        try {
            $this->dbconnection = new \PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);
        } catch (\PDOException $e) {
            //need to tell the user what to do in order to solve the error
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }//end of the constructor

    function getConnection(){
        return $this->dbconnection;
    }
}
