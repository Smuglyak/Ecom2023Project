<?php
namespace views;
/*
* This class will have a function that renders the home page with game lists.
*/
class GameList{
 //...$gameData is an array
  function render(...$gameData){
    
    $games = $gameData[0];
    
    
    $html = '<!DOCTYPE html>
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
          font-family: \'Press Start 2P\', cursive;
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
      </style>
    </head>
    <body>
      <header>
        <h1>EZ2BuyGames</h1>
        <form action="#" method="get">
          <input type="text" name="search" placeholder="Search games...">
        </form>
        <a href="http://localhost/EZ2BuyGames/views/login.php" class="button">Login</a>
      </header>
    
      <main>
        <h2>Find your favorite games on your favorite platforms</h2>
        <div class="platform-buttons">
          <a href="#" class="button">Playstation</a>
          <a href="#" class="button">Xbox</a>
          <a href="#" class="button">Nintendo</a>
          <a href="#" class="button">PC</a>
          
          <h1>Game</h1>
      <a href="http://localhost/EZ2BuyGames/views/gamecreate.php" class="button">Add Game</a>
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
      ';
      foreach ($games as $game){
        //TODO: Delete and Edit inserted Game.
       
      
    $html .= '<td>' . $game['game_name'] . '</td>'.
            '<td>' . $game['description'] . '</td>'.
            '<td>' . $game['release_date'] . '</td>'.
            '<td>' . $game['stock'] . '</td>'.
            '<td>' . $game['genre'] . '</td>'.
            '<td>' . $game['platform'] . '</td>'.
            '<td>' . $game['price'] . '</td>'.
            '<td>' . $game['game_points'] . '</td>'.
            
            '<td class="button-group">' .
            '<a href="http://localhost/EZ2BuyGames/views/edit_game.php?id= ' . $game['game_id']. ' " class="button edit-button">Edit</a>' . 
            '<a href="http://localhost/EZ2BuyGames/delete_game.php?game_id= ' . $game['game_id'] . '" class="button delete-button">Delete</a>'
            ;
      
    
    
    }
    $html .= '</tr></tbody>
    </table>
      </main>
    
    <footer class="footer">
      <p>&copy; 2023 EZ2BuyGames. All rights reserved.</p>
    </footer>
    </body>
    </html>';
    
    echo $html;
  }


}






?>