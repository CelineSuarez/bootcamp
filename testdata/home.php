<?php

ini_set('max_execution_time', 0);


	for ($year = 2001; $year <= 2010; $year++){
		
		//you get the index of $w by going through the raw data and
		//imagining each line as a string, then look for the [] position
		//based on how its tabbed.  Date and time are together because
		//there's only a space between them on the txt file, not a tab.
		//$w is for wind speed
		$w = $year < 2007 ? 1 : 7;

		//$a is for the air temperature
		$a = $year < 2007 ? 4 : 1;

		//$b is for the barometric pressure
		$b = $year < 2007 ? 6 : 2;
		$file = fopen('data/Environmental_Data_' . $year . '.txt', 'r');
		$firstline= fgets($file);
		$dataset = array();

		//we set a while loop so that way it will loop through all the data until it
		//reaches the end.  500 refers to the amount of characters
		while (($line = fgetcsv($file, 500, "\t")) !== false){

			//this gets the specific date from the line we grabbed.  
			//by using the substring we can grab characters and indicate where to stop
			$date = substr($line[0], 0, 10);
			
			$dataset[$date]['air_temp'][] = ltrim($line[$a]);
			$dataset[$date]['bar_press'][] = ltrim($line[$b]);
			$dataset[$date]['wind_speed'][] = ltrim($line[$w]);

			$startDate = new DateTime('2001-01-12');
$endDate = new DateTime('2010-05-26');
$oneDay = new DateInterval('P1D');
 try {
 	$db = new PDO('mysql:host=localhost; dbname=lakedata', 'homestead', 'secret');
 	$stmt = $db->prepare('INSERT INTO Weatherdata (date) VALUE (:date) '); 
 	while ($startDate <= $endDate){
 		$stmt->bindParam($date, $startDate->format('Y-m-d'));
 		$stmt->execute();
 		$startDate->add($oneDay);
 	}
 } catch (Exception $e){
 	echo $e->getMessage();
 }
 echo "Done";
		}


		fclose($file);
	};



	
echo "Hello";


//other tried code:

/*	$file = fopen('data/Environmental_Data_2001' . '.txt', 'r');
	$firstline= fgetcsv($file);
	$date = substr($firstline[0], 0 , 10);
	var_dump($firstline);
*/
//puts the file in a json format
	//$jsonfile = json_encode($file);
	//var_dump($jsonfile);

	//puts the json file into a readable json
	//$parsedjson = json_decode($jsonfile);
	//var_dump($parsedjson);
	//if (is_string($parsedjson) ){
	//	echo "say yes";
	//}
	//else {
	//	echo "not a string";
	//}

	/*$filed = fopen('data/Environmental_Data_2001.txt', 'r');

//fgets goes into the resource and gets the line from the file pointer
	$filecontents = fgets($filed);
	var_dump($filecontents);

	$parsedjson = json_encode($filecontents);
	var_dump($parsedjson);
*/