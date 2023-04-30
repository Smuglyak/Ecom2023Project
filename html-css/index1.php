<?php
  require_once(dirname(__DIR__)."/EZ2BuyGames/models/game.php");

  $game = new \models\Game();
  $games = $game->getAllGameProduct();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Game Catalog</title>
  <style>
    body {
      font-family: 'Press Start 2P', cursive;
      background-color: #282c34;
      color: #fff;
    }
    h1 {
      margin: 20px 0;
      font-size: 50px;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 4px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 40px;
    }
    th, td {
      text-align: left;
      padding: 10px;
    }
    th {
      background-color: #4CAF50;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 2px;
    }
    tr:nth-child(even) {
      background-color: #ddd;
    }
    tr:hover {
      background-color: #ffc107;
    }
    a.button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      margin-bottom: 20px;
    }
    a.button:hover {
      background-color: #3e8e41;
    }
    .edit-button {
      background-color: #2196F3;
      margin-right: 10px;
    }
    .delete-button {
      background-color: #f44336;
    }
    .button-group {
      text-align: center;
    }
    </style>
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
  <h1>Game Catalog</h1>
  <a href="http://localhost/EZ2BuyGames/views/add_game.php" class="button">Add Game</a>
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
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($games as $game) { ?>
        <tr>
          <td><?php echo $game['game_name']; ?></td>
          <td><?php echo $game['description']; ?></td>
          <td><?php echo $game['release_date']; ?></td>
          <td><?php echo $game['stock']; ?></td>
          <td><?php echo $game['genre']; ?></td>
          <td><?php echo $game['platform']; ?></td>
          <td><?php echo $game['price']; ?></td>
          <td><?php echo $game['game_points']; ?></td>

          <td class="button-group">
            <a href="http://localhost/EZ2BuyGames/views/edit_game.php?id=<?php echo $game['game_id']; ?>" class="button edit-button">Edit</a>
            <a href="http://localhost/EZ2BuyGames/delete_game.php?game_id=<?php echo $game['game_id']; ?>" class="button delete-button">Delete</a>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
<?php
if (isset($_GET['game_id'])) {
  $game_id = $_GET['game_id'];
  $game = new \models\Game();
  $game->deleteGame($game_id);
}

exit();
?>

