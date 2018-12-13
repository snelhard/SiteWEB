<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Recherche de match</title>
	</head>
	<body>
		Veuillez saisir la date du match recherché :<br /><br />
		<form action="rechercherMatch.php" method="post">
	 	 Mots-clés:<br>
	 	<input type="Date" name="dataRecherche"><br><br />
	  	<input type="reset" value="Reset">
	  	<input type="submit" value="Valider">
		</form>

		<?php
		//Connexion au serveur MySQL
		$link = mysqli_connect("localhost", "root", "", "siteweb")
			or die("Error " . mysqli_error($link));
		
	 	
		//Verification de la connexion
		if (mysqli_connect_errno()) {
			print("Connect failed: \n" . mysqli_connect_error());
			exit();
		}

		///Ecriture de la requête
		if(isset($_POST['dataRecherche'])) {
		    $dateRecherchee = $_POST['dataRecherche'];
		    $requete = "SELECT * FROM Match_ WHERE Date_match='$dateRecherchee'";

		    //Execution de la requête sur le serveur
			if( !$resquery=mysqli_query($link, $requete) ){
				die("Error:".mysqli_errno($link).":".mysqli_error($link));
			} else {
				//Traitement de la requête
				$temp = $resquery;
				
				while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
						echo "<b>Identifiant du match</b> : ". $row[0]." </br> <b>Date du match</b> : ". $row[1] . " </br> <b>Heure du match</b> : ". $row[2]."<br />"; 
						?>
						Modification ou suppression du match :
						<br />
						<form action="supprimerUnMatch.php" method="post">
							<input type="hidden" name="idMatch" value="<?php echo $row[0]; ?>" />
							<input type="submit" value="Supprimer">
						</form>
						<form action="ModifierMatch.php" method="post">
							<input type="hidden" name="idMatch" value="<?php echo $row[0]; ?>" />
							<input type="submit" value="Modifier">
						</form>
						</br>
						<?php
					}
				}
		}

		?>
	</body>
</html>