<?php
namespace controllers;

require(dirname(__DIR__)."/models/game.php");

class gameController{
  private $game;
    function __construct(){
    if(isset($_GET)){
      if(isset($_GET['action'])){
        $action = $_GET['action'];

        $viewClass = "\\views\\"."game".ucfirst($action);

        $game = new \models\Game();
        $games = $game->getAllGameProduct();
        
        if(isset($_POST)){
          if($action == 'create'){
            $game->setGameName($_POST['game_name']);
            $game->setGameDescription($_POST['description']);
            $game->setReleaseDate($_POST['release_date']);
            $game->setStock($_POST['stock']);
            $game->setGenre($_POST['genre']);
            $game->setPlatform($_POST['platform']);
            $game->setPrice($_POST['price']);
            $game->setGamePoints($_POST['game_points']);
            $this->game->createGameProduct();
          
            header("Location: http://localhost/EZ2BuyGames/index.php?resource=game&action=list");
          }
        }






        if(class_exists($viewClass)){
          $view = new $viewClass();
          $view->render($games);
        }
        
      }
    }
  
  
  }  

}


?>
