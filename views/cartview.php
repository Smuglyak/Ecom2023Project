<?php

namespace views;

require_once(dirname(__DIR__) . "/models/cart.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZ2BuyGames</title>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Press Start 2P', cursive;
            font-size: 14px;
        }

        body {
            background-color: #282c34;
            color: #fff;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
        }

        h1 {
            font-size: 50px;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            text-align: center;
            margin-bottom: 50px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        .button:hover {
            background-color: #3e8e41;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        tr > th {
            padding: 15px;
        }
    </style>
</head>

<body>

    <main>

        <h1>Cart</h1>

        <table>
            <thead>
                <tr>
                    <th>Name</th>   
                    <th>Description</th>
                    <th>Release Date</th>
                    <th>Stock</th>
                    <th>Genre</th>
                    <th>Platform</th>
                    <th>Price</th>
                    <th>Game Points</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </main>

    <footer class="footer">
        <p>&copy; 2023 EZ2BuyGames. All rights reserved.</p>
    </footer>
</body>

</html>