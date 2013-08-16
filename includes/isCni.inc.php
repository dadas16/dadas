<?php
	function isCni($cni){
		if(preg_match("#^([0-9]){3,4}/([0-9]){3}\.([0-9]){3}$#",$cni)){
			$resultat=0;
		}else{
			$resultat=1;
		}
		return $resultat;
	}
?>