<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>

<!-- to create a user, you need to specify that form is in post -->
    <form action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Already registered?</h2>
    <a href="http://localhost/index.php?resource=user&action=login">Login</a>
    <?php
    class UserLogin
    {
    }


    ?>
</body>

</html>