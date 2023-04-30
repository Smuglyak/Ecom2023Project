<?php  
require_once(dirname(__DIR__)."/models/game.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Game</title>
</head>
<body>
  <h1>Add Game</h1>
  <form action="add_game.php" method="post">
    <label for="game_name">Game Name:</label>
    <input type="text" id="game_name" name="game_name" required><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br>

    <label for="release_date">Release Date:</label>
    <input type="date" id="release_date" name="release_date" required><br>

    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" required><br>

    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" required><br>

    <label for="platform">Platform:</label>
    <input type="text" id="platform" name="platform" required><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required><br>

    <label for="game_points">Game Points:</label>
    <input type="number" id="game_points" name="game_points" required><br>

    <input type="submit" value="Add Game">
  </form>
</body>
</html>
<?php

/*
$game = new \models\Game();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game->setGameName($_POST['game_name']);
    $game->setGameDescription($_POST['description']);
    $game->setReleaseDate($_POST['release_date']);
    $game->setStock($_POST['stock']);
    $game->setGenre($_POST['genre']);
    $game->setPlatform($_POST['platform']);
    $game->setPrice($_POST['price']);
    $game->setGamePoints($_POST['game_points']);

    $game->createGameProduct();

    header("Location: http://localhost/EZ2BuyGames/index.php");
    exit();
  }
*/
?>
