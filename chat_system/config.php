<?php

	$dbhost = "localhost";
	$dbname = "id11595626_styx";
	$dbuser = "id11595626_root";
	$dbpass = 'password';


	try{
		$db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	



?>