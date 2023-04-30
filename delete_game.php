<?php
require_once(dirname(__DIR__)."/EZ2BuyGames/models/game.php");

if (isset($_GET['game_id'])) {
  $game_id = $_GET['game_id'];
  $game = new \models\Game();
  $game->deleteGame($game_id);
}

header("Location: http://localhost/EZ2BuyGames/index.php");
exit();
?>