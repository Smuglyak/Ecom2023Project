<?php
//February 13,2023
// __DIR__ -> this predifined constant gives the path to the current directory containing  this file.
// __DIR__ -> c:\xampp\htdocs\hrapp\models\

// dirname() -> a predefined function in PHP that returns the parent directorypath of the parameter

// dirname(__DIR__) -> c:\xampp\htdocs\hrapp
//This Model will have an access to the database by requiring the connection in core file.
namespace models;
require(dirname(__DIR__)."/core/dbconnectionmanager.php");
    class User{

        private $id;
        private $name;
        private $phone;
        private $email;

        private $dbConnection;

        function __construct(){
            $conManager = new \database\DBConnectionManager();

            $this->dbConnection = $conManager->getConnection();
        }

    function getAll(){
        $query = "Select * from users";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
       return $statement->fetchAll();
    }
    //Gets specific employee info based on employeeID.
    function getUser($userID){
        // "Select * from employees where id= 123;delete table users;" // SQL Injection
        $statement = $this->dbConnection->prepare("SELECT * FROM users where id=:id");
        $statement->bindParam('id', $userID); //'s' specifies the variable type=>'string'
        $statement->execute();
        return $statement->fetchAll();
    }

    function updateUser($userID, $newName, $newEmail, $newPhoneNum){

        $statement = $this->dbConnection->prepare("UPDATE users SET name=:name, phone=:phone, email=:email  where id=:id");
        $statement->bindParam('id', $userID); //'s' specifies the variable type=>'string'
        $statement->bindParam('name', $newName);
        $statement->bindParam('phone', $newPhoneNum);
        $statement->bindParam('email', $newEmail);
        $statement->execute();


    }













    }

    // TODO: Test driven development
    // Test the code before you continue

    //TEST
    $user = new User();
    $users = $user->getAll();



?>
