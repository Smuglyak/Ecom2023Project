<?php namespace views;?>
<html>
<body>

<h1>User Registration</h1>
<form action="" method="post">
  <label for="username">username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Register">
</form>

<h2> Already registered?</h2>
<a href="http://localhost/hrapp/index.php?resource=user&action=login">Login</a>

<?php

class UserCreate{


}

?>



</body>
</html>