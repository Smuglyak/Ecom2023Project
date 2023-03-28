<?php
namespace controllers;

require_once(dirname(__DIR__)."/models/product.php");
require(dirname(__DIR__)."/views/productsList.php");  

class ProductController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                $viewFile = "products".$action;

                $viewClass = "\\views\\products".ucfirst($action);
                $product = new \models\Product();
                $productsList = $product->getAll();
                if(class_exists($viewClass)){
                    if($action == "list"){
                        $viewProductObject = new $viewClass();
                        $viewProductObject->render($productsList);
                       

                    }

                }   
            }
        }
        

    }

}

?>