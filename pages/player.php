<?php 

	$club_name = urldecode($uri_segments[2]);
	$club = file_get_contents('./clubs/'.$club_name.'.html');

	// prendo giocatore filtrando per nome e età
	$player_name = urldecode($uri_segments[3]);

	// se non esiste club name reindirizzo alla home
	if (!$club_name || !$club || !$player_name) {
		header("Location: /");
	}

	$doc = new DOMDocument();

	$doc->loadHTML($club);

	$club = $doc->getElementsByTagName('tr');

	$player = [];

	foreach ($club as $row) {
		$cols = $row->getElementsByTagName('td');
		if($cols[0]->nodeValue == $player_name) {
			foreach ($cols as $index => $col) {
				// echo $config['columns'][$index].' ';
				// echo $col->nodeValue.'<br>';
				$player[$config['columns'][$index]] = $col->nodeValue;
			}
		}
	}

	// die(var_dump($player));

?>
<h1 class="player-title my-5">
	<?php echo '<a href="/club/'.$club_name.'">'.$club_name.'</a> - '.$player_name; ?>
</h1>
<div class="row">
	<div class="col-auto ">
		<div class="card m-auto player-card" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title"><?php echo $player_name; ?></h5>
				<h6 class="card-subtitle mb-2 text-muted">Ruolo: <i><?php echo $player['Ruolo']; ?></i></h6>
				<p class="card-text">
					Età: <?php echo $player["Eta'"]; ?><br>
					Nazione: <?php echo $player["Nazione"]; ?><br>
					CA: <?php echo $player["CA"]; ?><br>
					PA: <?php echo $player["PA"]; ?><br>
				</p>
			</div>
		</div>
	</div>
	<div class="col player-card" style="column-count: 3; column-gap: 1em;">
		<?php 
		foreach ($player as $skill_name => $skill_value) {

			switch (true) {
				case ($skill_value < 10):
					$skill_color = 'text-muted';
					break;

				case ($skill_value > 10 && $skill_value < 16):
					$skill_color = 'text-warning';
					break;

				case ($skill_value > 15):
					$skill_color = 'text-success';
					break;
				
				default:
					$skill_color = 'text-danger';
					break;
			}

			if(!in_array($skill_name, $config['exclude_from_player'])) {
		?>
			<div class="d-flex justify-content-between">
				<strong>
					<?php echo $skill_name; ?>:
				</strong>
				<strong>
					<?php echo '<span class="'.$skill_color.'">'.$skill_value.'</span><br>'; ?>
				</strong>
			</div>
		<?php
			}
		}
		?>
	</div>
</div>