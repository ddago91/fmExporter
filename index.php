<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/datatables.min.css"/>
	
	<link rel="stylesheet" href="/assets/style.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
		<a class="navbar-brand" href="#" style="color:#fff">
			<img src="/assets/pg-gaming-logo.png" alt="" style="max-height: 70px;" >
			Progetto <b> FM </b>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Squadre
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Serie A</a>
						<a class="dropdown-item" href="#">Serie B</a>
						<a class="dropdown-item" href="#">Serie C/A</a>
						<a class="dropdown-item" href="#">Serie C/B</a>
						<a class="dropdown-item" href="#">Serie C/C</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Calendario
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Serie A</a>
						<a class="dropdown-item" href="#">Serie B</a>
						<a class="dropdown-item" href="#">Serie C/A</a>
						<a class="dropdown-item" href="#">Serie C/B</a>
						<a class="dropdown-item" href="#">Serie C/C</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Classifiche
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Serie A</a>
						<a class="dropdown-item" href="#">Serie B</a>
						<a class="dropdown-item" href="#">Serie C/A</a>
						<a class="dropdown-item" href="#">Serie C/B</a>
						<a class="dropdown-item" href="#">Serie C/C</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				require('admin/columns.config.php');

				$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
				$uri_segments = explode('/', $uri_path);

					// die(var_dump($uri_segments[1] == ''));

				switch ($uri_segments[1]) {
					case '':
					require('home.php');
					break;

					case 'club':
					require('pages/club.php');
					break;

					case 'player':
					require('pages/player.php');
					break;

					default:
					var_dump($uri_segments[1]);
					require('404.php');
					break;
				}
				?>
			</div>
		</div>
	</div>
	
	



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/datatables.min.js"></script>

	<script>
		$('#validatedCustomFile').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>

    <script type="text/javascript" charset="utf-8">
    	var skillsCols = [];
    	for (var i = 7; i <= 44; i++) {
    		skillsCols.push(i);
    	}
    	console.log(skillsCols);

    	var language = {
    		"lengthMenu": "Mostro _MENU_ righe per pagina",
    		"zeroRecords": "Nessun risultato",
    		"info": "Mostro la pagina _PAGE_ of _PAGES_",
    		"infoEmpty": "Nessun risultato disponibile",
    		"infoFiltered": "(filtrato da _MAX_ righe totali)",

    		"emptyTable":     "Nessun dato disponibile nella tabella",
    		"thousands":      ".",
    		"loadingRecords": "Caricamento...",
    		"processing":     "Caricamento...",
    		"search":         "Ricerca:",
    		"paginate": {
    			"first":      "Prima",
    			"last":       "Ultima",
    			"next":       "Prossima",
    			"previous":   "Precedente"
    		},
    		"aria": {
    			"sortAscending":  ": attiva l'ordinamento ascendente",
    			"sortDescending": ": attiva l'ordinamento discendente"
    		}
    	};

    	$(document).ready(function() {
    		$('#clubTable').DataTable({
		    	// dom: 'Bfrtip',
		    	"columnDefs": [
		    	{
		    		"targets": skillsCols,
		    		"visible": false,
		    		"searchable": false
		    	}
		    	],
		    	// buttons: [
		     //        {
		     //            extend: 'colvisGroup',
		     //            text: 'Nascondo Skills',
		     //            show: [  ],
		     //            hide: skillsCols
		     //        },
		     //        {
		     //            extend: 'colvisGroup',
		     //            text: 'Mostro Skills',
		     //            show: skillsCols,
		     //            hide: [  ]
		     //        },
		     //    ],
		     "language": language
		 });
    		$('#playerTable').DataTable({
		    	// dom: 'Bfrtip',
		    	// "columnDefs": [
		     //        {
		     //            "targets": skillsCols,
		     //            "visible": false,
		     //            "searchable": false
		     //        }
		     //    ],
		    	// buttons: [
		     //        {
		     //            extend: 'colvisGroup',
		     //            text: 'Nascondo Skills',
		     //            show: [  ],
		     //            hide: skillsCols
		     //        },
		     //        {
		     //            extend: 'colvisGroup',
		     //            text: 'Mostro Skills',
		     //            show: skillsCols,
		     //            hide: [  ]
		     //        },
		     //    ],
		     "language": language
		 });
    	} );
    </script>
</body>
</html>