<?php
	function connect(){
		//Connect as root
		mysql_connect("localhost", "root", "" ) or die("Error while connecting to database");
		//Select db
		mysql_select_db("fcontinue") or die("Connection failed because: ".mysql_error());
	} 
?>