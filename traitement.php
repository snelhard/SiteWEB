<?php 
	require('config.php');
?>
	<?php 
	    	$requete = "SELECT * FROM Livre"; //à compléter

	        //Execution de la requête sur le serveur
		$resquery=mysqli_query($link, $requete);

