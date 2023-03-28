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
    require(dirname(__DIR__) . "/model/order.php");

    $order = new Order();

    $orders = $order->getAll();

    echo '<pre>';
    print_r($orders);
    echo '</pre>';
    $html = '<table id="employeesTable">';
    $html .= "<th>id</th>
                <th>name</th>
                <th>Edit</th>";

    // Loop and fill the table with data from the database
    foreach ($orders as $e) {

        $html .=  "<tr>
                    <td>" . $e['id'] . "</td>
                    <td>" . $e['name'] . "</td>
                    <td><a href=orderListUpdate.php?id=$e[id]>Edit</a></td>
                    </tr>";
    } // end foreach

    $html .= "</table>";

    echo $html;

    ?>
</body>

</html>