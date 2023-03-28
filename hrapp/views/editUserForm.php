<?php namespace views; ?>
<!DOCTYPE html>
<header>
<head>
<style>
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
</header>
<body>

<?php
//require(dirname(__DIR__)."/controllers/userController.php");
class UsersEdit{
  public function editForm($data){
     $users = $data;
    $html = "<form method=\"post\">";
foreach($users as $usr){
        $html .="  <label for=\"Full Name\">Name:</label>
        <input type=\"text\" id=\"fullName\" name=\"fullName\" value=\"{$usr['name']}\">
        <br>
        <label for=\"Phone\">Phone:</label>
        <input type=\"text\" id=\"phone\" name=\"phone\" value=\"{$usr['phone']}\">
        <br>
        <label for=\"Email\">Email:</label>
        <input type=\"text\" id=\"email\" name=\"email\" value=\"{$usr['email']}\">
        <br>
        <button type=\"submit\" name=\"sub\">UPDATE</button>
       ";
    }//end foreach
    $html .=" </form>";
    echo $html;
  }
}
?>
</body>
<html>
