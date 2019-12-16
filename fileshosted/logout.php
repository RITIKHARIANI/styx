<?php
	$path = "/";
	$domain = $_SERVER['SERVER_NAME'];
	setcookie("username","dead", time()-3600, $path, $domain);
	session_start();
    if(isset($_SESSION['username']))
    {
        unset($_SESSION['username']);
    }
	if (isset($_COOKIE["username"])) {
		unset($_COOKIE["username"]);
	 	setcookie("username",'', 0);

	 } 
	header("Location: http://".$_SERVER['SERVER_NAME']."/");
?>