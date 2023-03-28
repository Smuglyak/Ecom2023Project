<?php
require("..//core//dbconnectionmanager.php");

class Order
{
    private $id;
    private $name;

    private $dbconnection;

    function __construct()
    {

        $conManager = new DBConnectionManager();
        //if this was instance of the class DBConnectionManager, you would put ->, but the class 
        $this->dbconnection = $conManager->getConnection();
    }

    function getAll()
    {
        $query = "SELECT id, name from orders";

        $statement = $this->dbconnection->prepare($query);

        $statement->execute();

        return $statement->fetchall();
    }

    function getOrderById($id)
    {
        $query = "SELECT * from orders WHERE id=:id";

        $statement = $this->dbconnection->prepare($query);
        $statement->bindParam('id', $id);

        //i dont get this here
        $statement->execute();

        return $statement->fetchall();
    }

    function updateInstanceById($id, $name){
        $query = "UPDATE orders SET name=:name WHERE id=:id";
        $statement = $this->dbconnection->prepare($query);
        $statement->execute(['id'=>$id, 'name'=>$name]);
    }   


}


//print out the array of the data table
// echo '<pre>';
// print_r($orders);
// echo '</pre>';
