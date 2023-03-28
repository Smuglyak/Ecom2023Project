<?php

namespace controllers;

require(dirname(__DIR__) . "/model/user.php");

class UserController{

    //checks if there is a get request and gives a requested page, otherwise loads up default view 
    function __construct()
    {
        if (isset($_GET)) {
            if(isset($_GET['action'])){

                $action = $_GET['action'];

                $viewClass = "\\view\\"."User".ucfirst($action);

                $user = new \model\User();

                if(isset($_POST)){
                    if(isset($_POST['username'])){
                        $user->setUsername($_POST['username']);

                        if(isset($_POST['password'])){
                            $user->setPassword($_POST['password']);
                        }
                    }

                    if(class_exists($viewClass)){

                        $view = new $viewClass();
                    }
                }
            }
            

            // Redirect back to the order list page
            header("Location: login.php");
            exit;
        }



        // If no id parameter is present, show the order list
        // $order = new \model\Order();
        // $orders = $order->getAll();

        // include(dirname(__DIR__) . "/view/orderList.php");
        header("Location: orderList.php");
    }

}

?>