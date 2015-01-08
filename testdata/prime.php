<?php
//include 'home.php';
$startDate = new DateTime('2001-01-12');
$endDate = new DateTime('2010-05-26');
$oneDay = new DateInterval('P1D');
 try {
 	$db = new PDO('mysql:host=localhost; dbname=lakedata', 'homestead', 'secret');
 	$stmt = $db->prepare('insert into Weatherdata (date) VALUE ($dates) '); 
 	while ($startDate <= $endDate){
 		$stmt->bindParam('$dates', $startDate->format('Y-m-d'));
 		$stmt->execute();
 		$startDate->add($oneDay);
 	}
 } catch (Exception $e){
 	echo $e->getMessage();
 }
 echo "Done";