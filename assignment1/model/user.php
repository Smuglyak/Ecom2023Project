<?php
namespace model;

require_once("..//core//dbconnectionmanager.php");

class User{
    private $username;
    private $password;
    private $dbconnection;

    function __construct()
    {

        $conManager = new \database\DBConnectionManager();
        //if this was instance of the class DBConnectionManager, you would put ->, but the class 
        $this->dbconnection = $conManager->getConnection();
    }

    function getPasswordByUsername(){
        $query = "SELECT password from users WHERE username = :username";

        $statement = $this->dbconnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();

        // return (count($result) == 0) ? false : true;
    }

    function login(){
        $query = "SELECT password FROM users WHERE username :username";

        $statement = $this->dbconnection->prepare($query);

        $statement->execute(['username'=x.])
    }



    function create($user){

    }

    function getUser($username, $password){

    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }
}

?>