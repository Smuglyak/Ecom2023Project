<?php

//the namespace definition must be the first line in the script
//to access ac controller class we can refer to it as: \controller\className
namespace controllers;

require(dirname(__DIR__)."/models/employee.php");

//This will create a conflict with the spl_autoload_Register in the index.php
//we have to unify both 
    // spl_autoload_register(
    //     function ($class){

    //        require(dirname(__DIR__)."/views/".$class.".php");

    //     }

    // );


class EmployeeController{

    function __construct(){

        //Get the action that needs to be done on the resource
        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                // How do we load a specific view from here
                // after we have determined the action?
                // we could check the action
                // and use the spl_autoload_register function to require the necessary view

                $viewClass = "\\views\\"."Employees".ucfirst($action);

                $employee = new \models\Employee();

                $employees = $employee->getAll();

                if(class_exists($viewClass)){

                    $view = new $viewClass();

                    $view->render($employees);

                }
            }
        }
    }
}

//Test
// $employeeController = new EmployeeController;
?>