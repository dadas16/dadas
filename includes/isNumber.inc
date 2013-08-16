<?php
	function isNumber($number){
		if(preg_match("#^(((75)|(76)|(77)|(78)|(79)){1}) ([0-9]){6}$#",$number)){
			$resultat=ok;
		}else{
			$resultat=Nok;
		}
		return $resultat;
	}
?>