<?php
	
	//penser à mettre un require ('config.php') dans les pages.
	$server = "localhost";
	$login ="tts2330a";
	$mdp="DBBEhcD3";
	$db="tts2330a";
	//Connexion à la BD
	$link = mysqli_connect($server, $login, $mdp, $db)
	or die("Error " . mysqli_error($link));
	// Verification de la connexion
	if (mysqli_connect_errno()) {
		print("Connect failed: \n" . mysqli_connect_error());
		exit();
	}
?>