<?php
namespace controllers;

require(dirname(__DIR__)."/models/game.php");

class IndexController{

    function __construct(){
    if(isset($_POST)){
      if(isset($_POST['search'])){
        self::search();
      }
    }
  self::index();
  
  }

    public function index()
    {
        // Display default view
    }

    public function search()
    {
        $search_query = $_POST['search'];

        $game = new \models\Game();
        // $games = $game->searchGame($search_query);
        
    }

}
