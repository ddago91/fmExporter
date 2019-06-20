<?php 

	$club_name = urldecode($uri_segments[2]);
	$club = file_get_contents('./clubs/'.$club_name.'.html');

	// se non esiste club name reindirizzo alla home
	if (!$club_name || !$club) {
		header("Location: /");
	}

?>
<h1>
	<?php echo $club_name; ?>
</h1>
<div class="table-responsive">
	<table id="clubTable" class="table table-hovered table-bordered table-striped display responsive" width="100%">
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
			<?php echo $club; ?>
		</tbody>
	</table>
</div>