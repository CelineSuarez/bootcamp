<?php

//write a recursive function for a factorial number.  like 4! 
function factorial($n)
{
	//state the base case, what we're looking for is the factorial of 1
	if($n <= 1){
		return 1;
	}
	else
	{
		//we return it so that way the recurring function can go back
		//into itself.  The $n returned originally will still be there because
		//its the main one. it will go down but the first one will remain.
		// the factorial being called will send it into
		//a child of the parent function, and keep going until $n = 1
		//so it will end up being 4 * (4-1) * (3-1) * (2-1) or 4(3(2(1)))
		 return $n * factorial($n-1);
		 //it's doing all of those calculations but waiting til the end to put out
		 //the final result
	}
}

echo factorial(5);