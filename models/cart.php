<?php

namespace models;

require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Cart {

private $cart_id;
private $user_id;
private $total_balance;

    private $dbConnection;

    function __construct()
    {
        //Initiate an object from DBConnectionmanager class
        $conManager = new \database\DBConnectionManager();
        //set this variable to get the connection from DBConnectionmanager Object called conManager
        $this->dbConnection = $conManager->getConnection();
    }

    public function findUserCart($user_id)
    {
        $query = "SELECT * FROM cart WHERE user_id=:user_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();        
    }

}