<?php

	function fixName($string) {

		return str_replace('VALID', '', str_replace('SLASH', '/', str_replace('DWUKROPEK', ':', str_replace('.txt', '', $string))));

	}
	
	if(!isset($_GET['citation'])) {

		echo 'None';
		return;

	}

	$text = str_replace('+', ' ', $_GET['citation']);

	echo 'Podane slowo ('.$text.') wystepuje w: </br>';

	$scan = scandir('allAlbums');

	foreach($scan as $file) {

		if($file == '..' || $file == '.' || $file == '...') continue;

		#echo $file;

		$files = scandir('allAlbums/'.$file);

		foreach($files as $track) {

			if($track == '..' || $track == '.' || $track == '...' || $track == 'image.jpg' || $track == 'meta.txt') continue;

			#echo $track;

			$lines = file('allAlbums/'.$file.'/'.$track);

			$i = 0;

			foreach($lines as $line) {

				if(strpos(strtolower($line.''), strtolower($text.'')) !== false) {

					if($i == 0) {

						$i = 1;
						echo '	<b>'.fixName($track).':</b></br>';

					}

					echo '		- '.$line.'</br>';

				}

			}

		}

	}

?>