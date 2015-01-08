<?php

//make a function to sort an array using the insertion sort algorithm

function insertion_sort(&$list){
 	
 	//we subtract minus 1 since the first number can't be compared to anything
 	$len = (count($list));
	for($i=($len - 1); $i >= 0; $i--){


		//the value is the value of the indexed position of the list.  So the first one
		// would be 6 since $i is first 4, and list[4] is the index position.
	 	$value = $list[$i];

	 		//Now we're calling $i, not the array index value.  So first one
	 		//would be 4.  So 4-1 is 3, which is $j.
	 		$j = $i-1;

	 			//this begins the loop, as long as j doesn't equal a negative number
	 			while ($j >= 0) {

	 				//if the above condition is true, then it goes to this if statement
	 				if($value < $list[$j]){
	 					$list[$j+1] = $list[$j];
	 					$list[$j] = $i;
	 					
 					} elseif($value > $list[$j]){
 						$j = $j -1;
 						}
	 					
	 			}
 	}; 	

 };

$a = [2,4];
insertion_sort($a);
var_dump($a);
