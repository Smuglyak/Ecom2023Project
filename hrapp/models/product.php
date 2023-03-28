<?php
    namespace models;
    require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

class Product{

    private $id;
    private $name;
    private $description;
    private $price;

    private $dbConnection;

    function __construct(){

        $dbConnection = new \database\DBConnectionManager();

        $this->dbConnection = $dbConnection->getConnection();

    }

    function getAll(){

        $query = "select * from products";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();

    }


public function getProductById($id){
        $query = "select * from products WHERE id=:id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['id'=>$id]);
        return $statement->fetchAll();
    }


    public function update($id, $name, $description, $price){
        $query = "UPDATE products SET name=:name, description=:description, price=:price WHERE id=:id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['id'=>$id,'name'=>$name,'description'=>$description, 'price'=>$price ]);
    }



 }

?>