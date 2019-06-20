<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Progetto FM - Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Aggiorna Database</h1>
				<hr>
				<?php  // require('./form_textarea.php'); ?>
				<?php // require('./form.php'); ?>
				<?php 

				$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
				$uri_segments = explode('/', $uri_path);

					// die(var_dump($uri_segments[1] == ''));

				switch ($uri_segments[2]) {

					case 'players':
						require('./form_players.php');
						break;

					case 'leaderboards':
						require('./form_leaderboards.php');
						break;

					default:
						var_dump($uri_segments[2]);
						require('../404.php');
						break;

				}

				session_start();
				if(!empty($_SESSION['message'])) {
					echo '<p class="text-danger">'.$_SESSION['message'].'</p>';
				}

				?>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>