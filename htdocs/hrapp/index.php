<?php
//an Autoloader that registers whatever existing class.
spl_autoload_register(
    function ($class){

       require($class.".php");

    }

);

class App{
    function __construct(){
         //This statement checks if the action and resource value werent included in the index.php URL textbox
         if (!isset($_GET['action']) || !isset($_GET['resource'])) {
            //A header that redirects or just adds the value of action to list and resource to the user.
            //So that it will go to the lists of Users page by default.
            //header('Location: index.php?action=list&resource=user');
            
            header('Location: index.php?action=list&resource=product');
    
        }


        //checks if get is set with the index.php URL
        if(isset($_GET)){
            //if it is then, checks if the get 'resource=' in the urlhas also value.
            if(isset($_GET['resource'])){
                //Gets the resource=user and initialize it to a variable
                $usersResource = $_GET['resource'];
                //initialize an object from the users controller. the value looks like a path because the userController.php contains a code namespace inside.
                //To avoid any class conflicts.
                $controllerClass = "\\controllers\\".ucfirst($usersResource)."Controller";
                
                //checks if this class controller exist
                if(class_exists($controllerClass)){
                    //if yes then, initialize an object from userController class.
                    $controller = new $controllerClass();
                   
                    }

                   
                }
            }
        }
    }
//Initialze the object from app class to run the index.php
$app = new App();

?>