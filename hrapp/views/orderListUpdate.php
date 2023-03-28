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

$orderId = $_GET['id'];

$orders = $order->getOrderById($orderId);

function updateInstance($orderId, $order)
{
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $order->updateInstanceById($orderId, $name);
        header("location: http://localhost/assignment1/view/orderList.php");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateInstance($orderId, $order);
}

echo '<pre>';
print_r($orders);
echo '</pre>';

$html = '<form method="POST" action="">';
$html .= '<input type="hidden" name="orderId" value="' . $orderId . '">';
$html .= '<table id="employeesTable">';
$html .= "<th>id</th>
          <th>name</th>";
$html .= "<tr>
            <td>" . $orders[0]['id'] . "</td>
            <td><input type='text' id='name' name='name' value=". $orders[0]['name'] ."></td>
          </tr>";
$html .= "</table>";
$html .= "<button type='submit' name='submit'>Submit</button>";
$html .= '</form>';

echo $html;
?>

</body>

</html>