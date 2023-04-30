<?php
namespace controllers;

require(dirname(__DIR__)."/models/user.php");
class userController{
  private $user;

  function __construct(){
      if(isset($_GET)){
        if(isset($_GET['action'])){

            $action = $_GET['action'];
            $viewClass = "\\views\\"."User".ucfirst($action);
            

            $this->user = new \models\User();
            //TODO: Please add a function to check if the user already already exists so if yes, then enter another unique username

            //If the post was set (like if the user submitted a register form in add_user form)
            if(isset($_POST)){
              if($action == 'login'){
              //TODO: please create a login if statement to check create a session if the user already logs in
              if(isset($_POST['username']) && isset($_POST['password'])){
                $this->user->setUsername($_POST['username']);//sets the username which was entered in username login form
                $this->user = $this->user->getUserByUsername($_POST['username'])[0];//Object to array[0] 
                $this->user->setPassword($_POST['password']);//sets the password in the user model which was entered in password login form

                  //This will call the login function from user Model.
                  $this->user->$action();
              }
            }
              
              
              
              
              
              
              //if the action value is create in the url (localhost://EZ2BuyGames/index.php?action=create)
              if($action == 'create'){
                //It is necessary for the user to submit also his / her username and password otherwise, how will they be able to login to the website
                //If the user also entered submitted it with username and password
                if(isset($_POST['username']) && isset($_POST['password'])){
                  $this->user->setFname($_POST['fname']);
                  $this->user->setLname($_POST['lname']);
                  $this->user->setUsername($_POST['username']);
                  $this->user->setPassword($_POST['password']);
                  $this->user->setAddress($_POST['address']);
                  $this->user->setEmail($_POST['emailAddress']);
                  $this->user->setPhoneNum($_POST['phone']);
                  $this->user->setWallet($_POST['wallet']);
                
                  //Then use the function createUser from the object of user model class
                  $this->user->createUser();
                  
                }
                  
              }
            }
            /**
             * If the $viewClass exist like if 
             * For example: If UserCreate class was inside the add_user.php or UserCreate.php 
             * */
            
            if(class_exists($viewClass)){

              $view = new $viewClass($this->user);
            }
        }
      }


  }

}







?>