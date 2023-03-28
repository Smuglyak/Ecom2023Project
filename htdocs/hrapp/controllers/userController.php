<?php
//This Controller will be handling the client's input from the view by calling it's functions that contains userModel functions.
namespace controllers;
require(dirname(__DIR__)."/models/user.php");
require(dirname(__DIR__)."/views/usersList.php");
require(dirname(__DIR__)."/views/editUserForm.php");

class UserController{
 

function __construct(){
    //Checks if get is set
    if(isset($_GET)){
        //Checks if there's action in the URL
        if(isset($_GET['action'])){

            //http://localhost/hrapp/controllers/UserController.php?action=[VALUE] that value will be set to $action in the url;
            $action =  $_GET['action'];
            //users.$action will be either usersList or usersEdit  in the url
            //http://localhost/hrapp/controllers/UserController.php?action=[List] or [Edit]
            $viewFile = "Users".ucfirst($action);

            //It directly maps the \views\usersList class this looks like a path beacause of adding namespace inside the UsersList.php or UsersEdit.php code
            $viewClass = "\\views\\" . "Users" . ucfirst($action);
            
            //Initialize an object from user model class. again this type like a path since this user.php model contains namespace inside to avoid conflicts.
            $userModelObject = new \models\User();
            //calling a method from the user model to get All the values from the database which will be initialize to an array variable.
            $usersList = $userModelObject->getAll();
           
            //Checks if the UsersList or UsersEdit is a class that exist from the view
            if(class_exists($viewClass)){
               //Checks in the URL if action=list
                if($action == "list"){
                
                //Calls this class' method to open the list of data in the database which is the default opening page
                self::index($viewClass, $usersList);
               
                }
                //checks in the URL if action=edit
                if($action =="edit"){

                    //Initialize this variable to get the id value in the URL
                    $userID = $_GET['id'];
                    //Calls this class' method to open the update form based on the URL id
                    self::edit($viewClass,$userModelObject, $userID);
               }
            }
                else{
                echo "This \"$viewClass\" doesn't exists ";
            }

        }
    }
   

}

//An index function that displays the list of data which will be the default page
public function index($viewObject, $usersList){
    //This will create an object called viewClass or UserList class to be specific
    $viewObject = new $viewObject();
    //calls the render from UserList Class to display the html page. 
    //The usersList variable came from the getAll function from userModel to retrieve all the data from users table
    $viewObject->render($usersList);
}

//An edit function that will send the client's browser to a specific User info to edit in a form
public function edit($viewObject, $userModelObject, $userID){

    //initialize an object from user Model class
   $userModelObject = new $userModelObject();
   //calls the method call getUser from user model class which will get the specific user info based on the userID which then set it to a variable
   $getUser = $userModelObject->getUser($userID);

   //This will create an object called viewClass or UserEdit class to be specific
   $viewObject = new $viewObject();
   //calls the editForm from UserEdit class then it will get the current User chosen when the client click each of their button.
   $viewObject->editForm($getUser);

   //If the client clicked the update Button from the Edit Form
   if(isset($_POST['sub'])){
    //If the values of the user's name and either email or phone were not empty 
    if($_POST['fullName'] != "" && ($_POST['email'] != "" || $_POST['phone'] !="")){
     //Call the updateUser from userModel function to update the user's info    
     $userModelObject->updateUser($userID,$_POST['fullName'],$_POST['email'],$_POST['phone']);
    //Redirect the client back to the default page which is list page.
    header('location: http://localhost/hrapp/index.php?action=list&resource=user');
    }else{
       //else notify the client to enter a valid name and also enter either phone or email.  
       echo '<script>alert("Please enter your valid name. If valid name is already entered, please also enter either valid email or phone number.")</script>';
    }
}
}
}
//Test
//$userCont = new UserController();


?>