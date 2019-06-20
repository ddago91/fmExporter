<?php 
	$players = [];

	$file = file_get_contents('./database/players.txt');
	$players = explode("\n", $file);
?>

<h1 class="player-title my-5">
	Ricerca giocatori
</h1>
<div class="player-card table-responsive">
	<table id="searchTable" class="table table-hovered table-bordered table-striped display responsive" width="100%">
		<thead>
			<tr>
				<?php 
				foreach ($config['columns'] as $key => $col) {
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
			<?php 
			foreach ($players as $player) {
				$player = explode("\t", $player);
				if($player[0] == '') continue;
				echo '<tr>';
				foreach ($player as $col) {
					echo '<td>'.$col.'</td>';
				}
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</div>