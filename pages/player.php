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

	$player = '<tr>';

	foreach ($club as $row) {
		$cols = $row->getElementsByTagName('td');
		if($cols[0]->nodeValue == $player_name) {
			foreach ($cols as $col) {
				$player .= '<td>'.$col->nodeValue.'</td>';
			}
		}
	}

	$player .= '</tr>';

?>
<h1>
	<?php echo '<a href="/club/'.$club_name.'">'.$club_name.'</a> - '.$player_name; ?>
</h1>
<div class="table-responsive">
	<table id="playerTable" class="table table-hovered table-bordered table-striped display responsive" width="100%">
		<thead>
			<tr>
				<?php 
				foreach (array_keys($config['columns']) as $key => $col) {
					// if(in_array($key, [7,8,9])) {
					// 	echo "<th class=\"none\">$col</th>";
					// } else {
						echo "<th>$col</th>";
					// }
				}
				?>
			</tr>
		</thead>
		<tbody>
			<?php echo $player; ?>
		</tbody>
	</table>
</div>