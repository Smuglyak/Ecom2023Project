<?php
 require_once(dirname(__DIR__)."/models/user.php");

  $user =  new \models\User();

?>

<!--A page that a user can register by submitting a form-->
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Signup</title>
</head>
<body>
<h1>Sign Up Form</h1>
<form action="" method="post">
<label for="fname">Your First Name:</label>
<input type="text" id="fname" name="fname"><br>

<label for="lname">Your Last Name:</label>
<input type="text" id="lname" name="lname"><br>

<label for="username">Your Username:</label>
<input type="text" id="username" name="username"><br>

<label for="password">Your Password:</label>
<input type="password" id="password" name="password"><br>
<!--TODO: specify the complete address-->
<label for="address">Your Complete Address:</label>
<input type="text" id="address" name="address"><br>

<!--email address-->
<label for="emailAddress">Your Email Address:</label>
<input type="text" id="emailAddress" name="emailAddress"><br>

<!--phone number with specific format-->
<label for="phone">Your Phone number:</label>
<input type="tel" id="phone" name="phone" placeholder="xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"><br>

<!--Wallet-->
<label for="wallet">Amount of Your Wallet:</label>
<input type="tel" id="wallet" name="wallet" ><br>

<!--Sign up needs to have a javascript code to redirect it to the registration page form-->
<button type="Submit" value="">Sign up now!</button><br>

<!--Link to go back to login page-->
<a href="file:///C:/Users/Jed/Desktop/EZ2BuyGames%20View%20Pages/Customer%20Pages/customerlogin.html">Go back to login</a>
</form>
<?php
/*
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //TODO: Add more PLEASE
  $user->setFname($_POST['fname']);
  $user->setLname($_POST['lname']);
  $user->setUsername($_POST['username']);
  $user->setPassword($_POST['password']);
  $user->setAddress($_POST['address']);
  $user->setEmail($_POST['emailAddress']);
  $user->setPhoneNum($_POST['phone']);
  $user->setWallet($_POST['wallet']);

  $user->createUser();
}
*/
/**
 * This class creates a function to redirect or automatically log the user in. 
 * For example: if the user just submitted his / her credential info then this class will make
 *              the user login automatically and sends it to the homepage of the website.
 */
class UserCreate{
    private $user;

    //TODO: Inside this class' default constructor, please add the function above by calling a function in user and also membership provider.
}

?>
</body>
</html>
<?php


?>