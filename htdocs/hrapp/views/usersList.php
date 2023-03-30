<?php namespace views;?>
<!DOCTYPE html>
<header>
<head>
<style>
#usersTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


#usersTable td, #usersTable th {
  border: 1px solid #ddd;
  padding: 8px;
}


#usersTable tr:nth-child(even){background-color: #f2f2f2;}


#usersTable tr:hover {background-color: #ddd;}


#usersTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
</header>
<body>
<?php

//require(dirname(__DIR__)."/models/user.php");  
class UsersList{
  // a function that displays the data which will be called in the controller
  public function render(...$data){
    //initialize this to a data array which starts at index 0
    $users = $data[0];
    
    $html = "
    <table id=\"usersTable\">";
    $html .=  "<th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Actions</th>";

    //Loop then fill the table with data from the database
    foreach($users as $usr){
        $html .=" <tr>
        <td>{$usr['name']}</td>
        <td>{$usr['phone']}</td>
        <td>{$usr['email']}</td>
        <td>
        
        <button type=\"Submit\"><a href=\"http://localhost/hrapp/index.php?action=edit&resource=user&id={$usr['id']}\">Edit</a></button>
        
        </td>
        </tr>
        ";
    }//end  foreach
    $html .="</table>
    <a href=\"http://localhost/hrapp/index.php?action=list&resource=product\">Go to Products Table</a>
    ";
    echo $html;
  }
}
?>
</body>
<html>
