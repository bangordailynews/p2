<?php
  	error_reporting(E_ALL);
  	ini_set('display_errors', 1);
  	$temp_output = "";

	$content = array();

	if($_GET)
	{
		$wordCount = filter_var($_GET["wordCount"], FILTER_SANITIZE_STRING);
		$maxLength = filter_var($_GET["maxLength"], FILTER_SANITIZE_NUMBER_INT);
		$includeDigit = filter_var($_GET["includeDigit"], FILTER_VALIDATE_BOOLEAN);
		$capitalization = filter_var($_GET["capitalization"], FILTER_VALIDATE_BOOLEAN);
		$upperCase = filter_var($_GET["upperCase"], FILTER_VALIDATE_BOOLEAN);
		$lowerCase = filter_var($_GET["lowerCase"], FILTER_VALIDATE_BOOLEAN);
		$includeSymbol = filter_var($_GET["includeSymbol"], FILTER_VALIDATE_BOOLEAN);

		for($i = 1; $i <= 4; $i++){ // save web content in an array, so we don't call it in every loop
		$content[$i-1] = file_get_contents("http://esl.about.com/library/vocabulary/bl1000_list".$i.".htm");
		}

		for($i = 1; $i <= $wordCount; $i++){
			$loop = false; // default loop to false to run only once
			$loopCount = 0;

			if($maxLength > 0){ // if maxLength is more than 0
				
				if($includeDigit){ // if include digits (front or behind), 2 char should be taken out from the maxLength
					$maxLength -= 2;
				}

				$maxWordLength = floor($maxLength / $wordCount); // calculate maxWordLength

				do{ // do this at least once.
					preg_match_all('/mp3">(.*?)<\/a>/s', $content[rand(0, 3)], $matches);

					$choice = $matches[1][rand(1, 249)]." ";

					if(strlen($choice) <= $maxWordLength){ // if the chosen word's length is less than the max allowed
						$temp_output .= $choice; // save the choice
						$loop = false; // and exit the do-while loop
					} else {
						$loop = true; // otherwise, keep looping for the qualified word
					}

					$loopCount++;
					if($loopCount > 99){ // if we are looking for the chosen word for more than 5 loops
						$loop = false;
						$temp_output = "Your choice of total words and max length are unreasonable... Please change either the total number of words or maximum length of password.";
						die(json_encode(array('type' => 'error', 'text' => $temp_output))); // tell the user they are not setting reasonable request.
					}

				} while($loop);

			} else { // simply find the magic words :)
				preg_match_all('/mp3">(.*?)<\/a>/s', $content[rand(0, 3)], $matches);
				$temp_output .= $matches[1][rand(1, 249)]." ";
			}
		}
		$temp_output = rtrim($temp_output, " "); // remove tailing space
		
		if($includeDigit){
			if(rand(0, 1) == 1){ // pick front
				$temp_output = rand(0, 9)." ".$temp_output;
			} else { // pick back
				$temp_output = $temp_output." ".rand(0, 9);
			}
		}

		if($capitalization){
			$temp_output = ucwords($temp_output);
		}

		if($upperCase){
			$temp_output = strtoupper($temp_output);
		}

		if($lowerCase){
			$temp_output = strtolower($temp_output);
		}

		if($includeSymbol){
			$symbolsArray = array('$', '-', '@', '_', '&');
			$symbol = $symbolsArray[rand(0, 4)];

			$temp_output = str_replace(" ", $symbol, $temp_output);
		}

	} 

	die(json_encode(array('type' => 'message', 'text' => $temp_output)));
?>