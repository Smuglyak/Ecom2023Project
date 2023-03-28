<?php namespace views;?>
<html>
<head>
<style>
#employeesTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#employeesTable td, #employeesTable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employeesTable tr:nth-child(even){background-color: #f2f2f2;}

#employeesTable tr:hover {background-color: #ddd;}

#employeesTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<?php

// The employee data will be passed by the controller to this view

// require(dirname(__DIR__)."/models/employee.php");
/*
    $employee = new Employee();

    $employees = $employee->getAll();
*/

class EmployeesList{

  // The view will receive the data that needs to be displayed
  // And it may receive additional data such as messages to display e.g., error messages

  // To make the view's function accomodate for a variable type of data we could:
  // 1- Either make the render function accept a variable number of parameters:
  // function render(...$data)
  // 2- OR define the parameters as an array

  private $user;

  public function __construct($user)
  {
    $this->user = $user;

    


  }

  function render(...$data){

    
/*
    The target HTML should look like:

    <table>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <tr>
            <td>John Smith</>
            <td>1234456789</>
            <td>john@gmail.com</td>
        </tr>
    </table>

*/

    $employees = $data[0];

    $html = '<table id="employeesTable">';
    $html .= "<th>Name</th>
                <th>Phone</th>
                <th>Email</th>";

    // Loop and fill the table with data from the database
    foreach($employees as $e){

        $html .=  "<tr>
                    <td>".$e['name']."</td>
                    <td>".$e['phone']."</td>
                    <td>".$e['email']."</td>
                    </tr>";
    }// end foreach

    $html .= "</table>";

    echo $html;


  }  


}



?>

</body>
</html>