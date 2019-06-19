<?php
//$currentPwd='80cbbe57c80791e76fc1814c32f2f43fe7a7f7087376dac13b27ca388b8c5f72bf3a10400f4a4c354d9888a025deccd63dd491036c76341e299672f6fccf8a6a'; //FmExport2019!
$currentPwd = '0a9fe7cc173c53cb7c7449a9bedf4512053dca33d219ff2aba6afa759f5bbac273b38cd0194a2c7c69bf28cf9ad78d060bbcad84ee5a40fc483603677028b580'; //pollo
$players = $_POST['players'];


$homepage = file_get_contents($file['tmp_name']);
//$password=hash('sha512', 'FmExport2019!');
$password=hash('sha512', $_POST['token']);
if($password===$currentPwd){

	$doc = new DOMDocument();

	$doc->loadHTML($homepage);
	$dir = '../clubs';
	$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
	$files = new RecursiveIteratorIterator($it,
	             RecursiveIteratorIterator::CHILD_FIRST);
	foreach($files as $file) {
	    if ($file->isDir()){
	        rmdir($file->getRealPath());
	    } else {
	        unlink($file->getRealPath());
	    }
	}

	// separo i giocatori (riga per riga)
	$rows = explode("\n", $players);

	foreach ($rows as $player) {
		$cols = explode("\t", $player);
		// squadra colonna 5
		$my_file = '../clubs/'.$cols[5].'.html';
		// nome colonna 0
		file_put_contents($my_file, $cols[0].' ('.$cols[5].')'.PHP_EOL , FILE_APPEND | LOCK_EX);
	}

}else{
	session_start();
	$location='./';
	$_SESSION['message'] = 'Token Errato';
	header("Location: $location");
}




















