<?php
	function isNumber($number){
		if(preg_match("^((75|76|77|78|79){1}) ([ ]?[0-9]{2}){3}$",$number)){
			$message=$number;
		}else{
			$message="Désolé,le numéro saisi ne respecte pas le format. Exemple d'un numero correct. 79 900 902",
		}
		return $message;
	}
?>