<?php
namespace models;

require(dirname(__DIR__)."/core/dbconnectionmanager.php");

require(dirname(__DIR__)."/core/membershipprovider.php");

class User{

    private $username;
    private $password;

    private $dbConnection;

    private $membershipProvider;

    function __construct(){

        $conManager = new \database\DBConnectionManager();

        $this->dbConnection = $conManager->getConnection();

        $this->membershipProvider = new \membershipprovider\MembershipProvider($this);

    }

    function create(){
       
        // As a note we should check if the user already exists before creating the user
        // a constraint may be put in the database to prohibit duplicate users with the same username

        $query = "INSERT INTO users (username, password) VALUES(:username, :password)";

        $statement = $this->dbConnection->prepare($query);

        // We have specified in the query the username and password as query parameters
        // this is helpfull to avoid SQL injection, since the values of username and password are entered by the user
        // if we send them as is to the database engine they might contain scripts that will execute and do malicisous actions

        // After preparing the statement the engine knows that the additional parameters are just data and not part of the executable query

        // Then when we want to execute the query we Bind the parameters to the actual data
        // here we are providing the actual data as an array parameter to the 'execute' function

        // Another option is to use the bindParam function instead of passing the actual values to the execute function
        // $statement->bindParam(':username', $this->username, PDO::PARAM_STR);

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        return $statement->execute(['username' => $this->username, 'password'=> $hashedPassword]);

    }

    function login(){

        // Get the password from the DB

        $dbPassword = $this->getPasswordByUsername();

        if(password_verify($this->password, $dbPassword)){

           $this->membershipProvider->login();

        }

    }

    function getPasswordByUsername(){

        $query = "SELECT password FROM users WHERE username = :username";

        $statement = $this->dbConnection->prepare($query);
        
        $statement->execute(['username'=> $this->username]);
/*
        $result = $statement->fetchAll();

        return (count($result) == 0) ? false : true; // Ternary operator
*/
        return $statement->fetchColumn(0);

    }



    function getUser($username, $password){


    }

    public function setUsername($username){

        $this->username = $username;

    }
   
    public function getUsername(){

        return $this->username;

    }

    public function setPassword($password){

        $this->password = $password;

    }

}

?>