	<?php
	require_once(dirname(__DIR__) . "/Project/models/game.php");

	spl_autoload_register(
		function ($class) {

			require($class . ".php");
		}
	);

	class App
	{
		function __construct()
		{

			if (isset($_GET)) {
				if (isset($_GET['resource'])) {
					$resource = $_GET['resource'];

					$controllerClass = "\\controllers\\" . ucfirst($resource) . "Controller";

					if (class_exists($controllerClass)) {
						$controller = new $controllerClass();
					}
				}
			}
		}
	}
	$app = new App();
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<!-- <link rel="stylesheet" href="../views/css/landingpage.css"> -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>EZ2BuyGames Landing Page</title>
		<link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
		<style>
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				font-family: 'Press Start 2P', cursive;
				font-size: 14px;
			}

			.banner {
				background-image: url('../html-css/images/banner.jpg');
				background-size: cover;
				background-position: center;
				height: 500px;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				text-align: center;
				color: #fff;
			}

			.banner h1 {
				font-size: 4em;
				margin: 0;
				color: #a9a9a9;
			}

			.banner p {
				font-size: 1.5em;
				margin: 30px 0;
				color: #a9a9a9;
			}

			.game-card {
				background-color: white;
				border-radius: 5px;
				box-shadow: 0 2px 4px rgba(0, 0, 0, .3);
				margin: 20px;
				padding: 20px;
				text-align: center;
			}

			.game-card img {
				max-width: 100%;
			}

			.game-card h3 {
				font-size: 1.5em;
				margin: 20px 0;
			}

			.game-card p {
				font-size: 1.2em;
				margin: 20px 0;
			}

			.game-card button {
				background-color: #333;
				border: none;
				color: white
			}

			header {
				background-color: #171a21;
				padding: 20px;
				box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.2);
			}

			nav {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			nav ul {
				list-style: none;
				margin: 0;
				padding: 0;
				display: flex;
			}

			nav li {
				margin: 0 10px;
			}

			nav a {
				text-decoration: none;
				font-size: 18px;
				font-weight: bold;
				color: #a9a9a9;
				padding: 10px;
				border-radius: 5px;
				transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
			}

			nav a:hover {
				color: #fff;
				background-color: #1b2838;
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
		</style>
	</head>

	<body>
		<header>
			<nav>
				<ul>
					<li><a href="#">Store</a></li>
					<li><a href="#">Community</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Support</a></li>
					<li><a href="http://localhost/Project/views/login.php">Login</a></li>
					<li><a href="#">Language</a></li>
					<li><a href="http://localhost/Project/views/cartview.php">Cart</a></li>
				</ul>
			</nav>
		</header>

		<main>
			<section class="banner">
				<h1>Welcome to Ez2buyGames</h1>
				<p>Discover and buy amazing games for you and your step-sisters.</p>
			</section>

			<section class="featured-games">

				<br>
				<br>

				<h2>Find your favorite games on your favorite platforms</h2>
				<div class="platform-buttons">
					<a href="#" class="button">Playstation</a>
					<a href="#" class="button">Xbox</a>
					<a href="#" class="button">Nintendo</a>
					<a href="#" class="button">PC</a>
					<form action="index.php?action=search" method="POST">
						<input type="text" name="search_query" placeholder="Search games...">
						<button type="submit">Search</button>
					</form>
					<br>
					<br>

					<h1>Add a Game as a moderator</h1>
					<a href="http://localhost/Project/views/add_game.php" class="button">Add Game</a>

					<?php
					//implement database here Vehab instead...
					$games2 = array(
						array(
							"title" => "Game 1 Title",
							"description" => "Game 1 description goes here.",
							"image" => "game1.jpg",
							"link" => "#"
						),
						array(
							"title" => "Game 2 Title",
							"description" => "Game 2 description goes here.",
							"image" => "game2.jpg",
							"link" => "#"
						)
						// add more games here as needed
					);

					//1 type to show games
					foreach ($games2 as $game) {
						echo '<div class="game-card">';
						echo '<img src="' . $game["image"] . '" alt="' . $game["title"] . '">';
						echo '<h3>' . $game["title"] . '</h3>';
						echo '<p>' . $game["description"] . '</p>';
						echo '<a href="' . $game["link"] . '">Play Now</a>';
						echo '</div>';
					}
					echo '<pre>';
					print_r($games);
					echo '</pre>';
					?>
					<!-- 2 type to show games -->
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
									<td><?php echo $game[1]['game_name']; ?></td>
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
			</section>
		</main>

		<footer>
			© 2023 Ez2BuyGames Corporation. All rights reserved. All trademarks are property of their respective owners in the US and other countries.
			VAT included in all prices where applicable.
		</footer>
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