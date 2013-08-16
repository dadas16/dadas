<?php
	function isMobile($number){
		if(preg_match("#^(((75)|(76)|(77)|(78)|(79)){1})([0-9]{6})$#",$number)){
			$resultat=1;
		}else{
			$resultat=0;
		}
		return $resultat;
	}
?>