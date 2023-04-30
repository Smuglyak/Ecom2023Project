<?php
namespace models;

require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");


 class Game{
    private $game_id;
    private $game_name;
    private $description;
    private $date_added;
    private $release_date;
    private $stock;
    private $genre;
    private $platform;
    private $price;
    private $game_points;
    
    private $dbConnection;

    function __construct(){
     //Initiate an object from DBConnectionmanager class
     $conManager = new \database\DBConnectionManager();
    //set this variable to get the connection from DBConnectionmanager Object called conManager
    $this->dbConnection = $conManager->getConnection();
    }
    //A function that inserts or creates a Gameproduct data in game table
    function createGameProduct(){
      $query ="INSERT into game (game_name, description, date_added, release_date, stock, genre, platform, price, game_points)
              VALUES(:game_name, :description, :date_added, :release_date, :stock, :genre, :platform, :price, :game_points)";

      $currentdate = date('Y-m-d H:i:s');
      $statement = $this->dbConnection->prepare($query);

      return $statement->execute(['game_name' => $this->game_name, 'description' =>$this->description, 'date_added'=>$currentdate, 
                                'release_date'=>$this->release_date, 'stock'=>$this->stock, 'genre'=>$this->genre, 'platform'=>$this->platform, 'price'=>$this->price, 'game_points'=>$this->game_points]);
  }
    //A function that displays all the inserted game from game table
    function getAllGameProduct(){
      $query = "SELECT * from game";
      $statement = $this->dbConnection->prepare($query);
      $statement->execute();
      return $statement->fetchAll();

    }

    //A function that deletes the specific game data from game table
    function deleteGame($game_id){
      $query = "DELETE FROM game WHERE game_id = :game_id";
      $statement = $this->dbConnection->prepare($query);
      return $statement->execute(['game_id' => $game_id]);
      
    } 



    //Setters and Getters Function to set or get the property from the Game object
     // Setters and getters for the private properties
  function setGameName($name) {
      $this->game_name = $name;
  }

  function setGameDescription($description) {
      $this->description = $description;
  }

  function setReleaseDate($release_date) {
      $this->release_date = $release_date;
  }

  function setStock($stock) {
      $this->stock = $stock;
  }

  function setGenre($genre) {
      $this->genre = $genre;
  }

  function setPlatform($platform) {
      $this->platform = $platform;
  }

  function setPrice($price) {
      $this->price = $price;
  }

  function setGamePoints($game_points) {
      $this->game_points = $game_points;
  }

  function getGameName() {
      return $this->game_name;
  }

  function getGameDescription() {
      return $this->description;
  }

  function getReleaseDate() {
      return $this->release_date;
  }

  function getStock() {
      return $this->stock;
  }

  function getGenre() {
      return $this->genre;
  }

  function getPlatform() {
      return $this->platform;
  }

  function getPrice() {
      return $this->price;
  }

  function getGamePoints() {
      return $this->game_points;
  }


 }
?>