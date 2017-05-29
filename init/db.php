<?php

	$connection = new mysqli("localhost","root","","test");	
	
	if(!$connection->connect_error){

		define("CONNECTED",true);

	}else{

		define("CONNECTED",false);

	}

?>