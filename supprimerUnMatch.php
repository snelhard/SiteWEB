<?php


	 ///Connexion au serveur MySQL
	$server = "localhost";
	$login ="root";
	$mdp="";
	$db="siteweb";


	$link = mysqli_connect($server, $login, $mdp, $db) or die("Error " . mysqli_error($link));

	///Verification de la connexion
	if (mysqli_connect_errno()) {
		print("Connect failed: \n" . mysqli_connect_error());
		exit();
	}


	if(isset($_POST['idMatch'])) {
		$idMatch=$_POST['idMatch'];
		$requeteSupp = "DELETE FROM Match_ WHERE id_match='$idMatch'";

		if( !$resquery=mysqli_query($link, $requeteSupp) ){
		die("Error:".mysqli_errno($link).":".mysqli_error($link));
		} else {
		echo "Match supprimé !";
		}
	}
?>