<?php 

	$team_name = $uri_segments[2];
	$team = file_get_contents('./clubs/'.$team_name.'.html');

	// se non esiste team name reindirizzo alla home
	if (!$team_name || !$team) {
		header("Location: /");
	}

?>
<h1>
	<?php echo $team_name; ?>
</h1>
<div>
	<?php echo $team; ?>
</div>