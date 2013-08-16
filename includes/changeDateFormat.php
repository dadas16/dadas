<?php
	function changeDateFormat($dob)
	{
		$dateArray=explode("/",$dob); //Split the Array
		$var_day = $dateArray[0];  //Day segment
		if(strlen($dateArray[1]) == 1)
		{
			$var_month = "0".$dateArray[1]; //Month Segment
		}
		else
		{
			$var_month = $dateArray[1]; //Month Segment
		}	
		$var_year = $dateArray[2];  //Year Segment
		
		$dob ="$var_year-$var_month-$var_day"; //Join Them Together
		return $dob;
	}
?>