<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderList</title>
    <style>
        #employeesTable {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #employeesTable td,
        #employeesTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #employeesTable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #employeesTable tr:hover {
            background-color: #ddd;
        }

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
    // require_once(dirname(__DIR__) . "/model/order.php");

    // $order = new \model\Order();

    // $orders = $order->getAll();
    class OrderList
    {
        public function render(...$data)
        {

            $orders = $data[0];

            $html = '<table id="employeesTable">';
            $html .= "<th>id</th>
                <th>name</th>
                <th>Edit</th>";

            //Loop then fill the table with data from the database
            foreach ($orders as $order) {
                $html .= " <tr>
        <td>{$order['id']}</td>
        <td>{$order['name']}</td>
        <td><button type=\"Submit\"><a href=\"http://localhost/hrapp/index.php?action=edit&resource=user&id={$order['id']}\">Edit</a></button></td>
        </tr>
        ";
            echo $html;
        }
            $html .= "</table>";
    }
}

    class UsersList
    {
        // a function that displays the data which will be called in the controller
        public function render(...$data)
        {
            //initialize this to a data array which starts at index 0
            $users = $data[0];

            $html = "
    <table id=\"usersTable\">";
            $html .=  "<th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Actions</th>";

            //Loop then fill the table with data from the database
            foreach ($users as $usr) {
                $html .= " <tr>
        <td>{$usr['name']}</td>
        <td>{$usr['phone']}</td>
        <td>{$usr['email']}</td>
        <td>
        
        <button type=\"Submit\"><a href=\"http://localhost/hrapp/index.php?action=edit&resource=user&id={$usr['id']}\">Edit</a></button>
        
        </td>
        </tr>
        ";
            } //end  foreach
            $html .= "</table>";
            echo $html;
        }
    }

    ?>
</body>

</html>