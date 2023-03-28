<?php namespace views;?>
<html>
<body>

<h1>User Login</h1>
<form action="" method="post">
  <label for="username">username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Login">
</form>

<h2> Not registered?</h2>
<a href="http://localhost/hrapp/index.php?resource=user&action=create">Register</a>

<?php

class UserLogin{


}

?>



</body>
</html>