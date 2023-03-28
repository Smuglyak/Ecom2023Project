<?php
namespace database;
//February 13 2023
class DBConnectionManager{

    private $username;
    private $password;
    private $server; //Host
    private $dbname;
    //We need to manipulate the connection by creating a variable called $dbConnection
    private $dbConnection;

    //In PHP supporting multiple constructor is not out of the box unlike java
    // you would implement the default constructor with variable number of parameters 
    //then you call the specific constructor based on the receives parameter
    /*
    function __construct(...$params){

        //check the $params
        //call the specific parametrized constructor
        

    }
*/

function __construct(){
    
    // TODO: Set credentials as environment variables
    //Normally we do not set the username and password directly here 
    //for security reasons
    $this->username = "root"; //NOTE: usually you do not use the root account. You should create another user.
    $this->password = "";
    $this->server = "localhost";
    $this->dbname = "hrapp";

    // There are two libraries to use DB connection: MySQLI and PDO
    // PDO supports the connection to databases other than MySQL
    // Which one to choose is specific to the application being developed
    //https://www.php.net/manual/en/pdo.connections.php

    //We have a high risk of failure, it is good to use a try{} catch{} statement
    try{
        $this->dbConnection = new \PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);
    }catch(\PDOException $e){
        // TODO: Use logging
        //It is not a good practice to just output the error message to the user
        //The error must be logged, and a user friendly message displayed 
        //giving the user option on what to do as an alternative
        print "Error!: " . $e->getMessage() . "<br/>";

    }

}// End constructor 
     function getConnection(){
        

        return $this->dbConnection;

    }


}
?>