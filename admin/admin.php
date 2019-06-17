<?php
//$currentPwd='80cbbe57c80791e76fc1814c32f2f43fe7a7f7087376dac13b27ca388b8c5f72bf3a10400f4a4c354d9888a025deccd63dd491036c76341e299672f6fccf8a6a'; //FmExport2019!
$currentPwd='0a9fe7cc173c53cb7c7449a9bedf4512053dca33d219ff2aba6afa759f5bbac273b38cd0194a2c7c69bf28cf9ad78d060bbcad84ee5a40fc483603677028b580'; //pollo
$file=$_FILES['players'];

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


	$ols = $doc->getElementsByTagName('table');
	$titleColumn=[];
	foreach ($ols as  $ol) {
		$nodes = $ol->getElementsByTagName('tr');
		foreach ($nodes as $keytest =>$node) {
			$head=$node->getElementsByTagName('th');
			foreach ($head as $keyTh => $th) {
				$titleColumn[]=trim($th->nodeValue);
			}
			$row=$node->getElementsByTagName('td');

			foreach ($row as $key => $td) {
				if($key===array_search('Club', $titleColumn)){
					echo trim($td->nodeValue)."<br>";

					$my_file = '../clubs/'.$td->nodeValue.'.html';
					//$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); 
					file_put_contents($my_file, $td->nodeValue.PHP_EOL , FILE_APPEND | LOCK_EX);
					//fwrite($handle, $td->nodeValue.$keytest);
					//fclose($handle);

					//$newcontent = file_get_contents("template.html");
				}

			}	

		}
	}
}else{
	session_start();
	$location='./';
	$_SESSION['message'] = 'Token Errato';
	header("Location: $location");
}




















