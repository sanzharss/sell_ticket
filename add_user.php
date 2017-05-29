<?php

	include 'db.php';

	$login = $_POST['login'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$age = $_POST['user_age'];
	$full_name = $_POST['user_full_name'];


	if($pass1==$pass2){

		$sql_text = "INSERT INTO users(id,login,password,age,full_name) 
					 VALUES(NULL,\"".$login."\",\"".$pass1."\",".$age.",\"".$full_name."\")";
		
		$connection->query($sql_text);

		header("Location:index.php?success=1");

	}else{

		header("Location:index.php?error=1");

	}

?>