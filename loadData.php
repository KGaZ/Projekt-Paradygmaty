	<?php

		function fixName($string) {

			return str_replace('VALID ', '', str_replace('SLASH', '/', str_replace('DWUKROPEK', ':', $string)));

		}

		global $dailyAlbum, $dailyTrack, $dailyLine, $dailyImage;

		try {

			if(isset($_GET['keyId'])) {

				srand(crc32($_GET['keyId']));

			}

			$dailyRandomAlbum = rand(0, 14);

			$scan = scandir('albums');

			$count = 0;

			foreach($scan as $file) {

				if($file == '..' || $file == '.' || $file == '...') continue;

				if($count == $dailyRandomAlbum) {

					$files = scandir('albums/'.$file);

					$maxRand = sizeof($files) - 5;

					$dailyRandomTrack = rand(0, $maxRand);

					$i = 0;

					#echo ' - 2';

					foreach($files as $track) {

						if($track == '..' || $track == '.' || $track == '...' || $track == 'image.jpg' || $track == 'meta.txt') continue;

						if($i == $dailyRandomTrack) {

							$lines = file('albums/'.$file.'/'.$track);
							$amount = 0;
							#echo ' - 3';

							foreach($lines as $line) {

								$amount+=1;

							}

							$dailyRandomLine = rand(0, $amount - 1);

							$h = 0;

							foreach($lines as $line) {

								if($h == $dailyRandomLine) {

									$dailyAlbum = fixName($file.'');
									$dailyTrack = fixName($track.'');
									$dailyLine = $line;
									$dailyImage = 'albums/'.$file.'/image.jpg';

									break;

								} else {

									$h += 1;
									continue;

								}

							}

							break;

						} else {

							$i+=1;
							continue;

						}

					}

					break;

				} else {

					$count+=1;
					continue;

				}


			}

		} catch(Exception $e) {

			echo 'Caught Exception: ', $e->getMessage(), "\n";

		}

	?>