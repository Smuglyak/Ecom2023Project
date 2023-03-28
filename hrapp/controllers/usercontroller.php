<?php
namespace controllers;

require(dirname(__DIR__)."/models/user.php");

class UserController{

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){

                $action = $_GET['action'];

                $viewClass = "\\views\\"."User".ucfirst($action);

                // Read the user information from the request
                // and setup a user model object
                $user = new \models\User();                 

                if(isset($_POST)){
                    if(isset($_POST['username']) && isset($_POST['password'])){
                        $user->setUsername($_POST['username']);

                        $user->setPassword($_POST['password']);

                        // Based on the action determine which Model function to call
                        // We have two options:
                        // 1-
                        // Either the name of the URL parameter needs to match the function in the model 
                        //2-
                        // OR we will have to do a conditional logic to check what the action is and call
                        // the appropriate function in the model
                        $user->$action();
                    
                    }

                }

                if(class_exists($viewClass)){

                    $view = new $viewClass();

                }

            }

        }
    }
}

?>