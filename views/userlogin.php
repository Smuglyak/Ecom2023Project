<?php
namespace views;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
<form action="login.php" method="post">
<input type="text" id="username" name="username"><br>
<input type="password" id="password" name="password"><br>
<!--To Do After-->
<input type="checkbox" id="rm" name="rm">
<label for="rm">Remember me</label>
<!--Link for forgot password page-->
<a href="file:///C:/Users/Jed/Desktop/EZ2BuyGames%20View%20Pages/Customer%20Pages/resetpass.html">Forgot your password?</a><br>
<button type="submit" value=""><a href="http://localhost/EZ2BuyGames/index.php?resource=user&action=login">Login</button><br>
<!--Sign up needs to have a javascript code to redirect it to the registration page form-->
<button type="button" value=""><a href="http://localhost/EZ2BuyGames/index.php?resource=user&action=create">Sign up now!</a></button>
</form> 
</body>
</html>
<?php
class UserLogin{
  private $user;

  function __construct($user){

    $this->user = $user;

    if($this->user->login()){
     // calls the membershipprovider object from the user to call login function from that object of class
      $this->user->getMemberShipProvider()->login();
      header("location: http://localhost/EZ2BuyGames/index.php?resource=game&action=list");

    }
    
  }
}
?>