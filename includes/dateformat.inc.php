<?php
	function dateformat($date){
		//$date=date
		$datefr=explode("-",$date);
		$formatdate=$datefr[2]."-".$datefr[1]."-".$datefr[0];
		return $formatdate;
	}
	//$date=date('Y-m-d');
	//$datefr=dateformat($date);
	//echo $datefr;
?>