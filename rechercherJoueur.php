<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Recherche de contact</title>
	</head>
	<body>
		Veuillez saisir le numero de licence ou bien le nom ET le prenom d'un joueur<br /><br />
		<form action="rechercherJoueur.php" method="post">
	 	 Mots-clés:<br>
	 	Numero de licence :<input type="number" name="numLicence"><br />
	 	Ou bien : </br>
	 	Nom du joueur :<input type="text" name="NomJoueur"><br />
	 	Prenom du joueur :<input type="text" name="PrenomJoueur"><br />
	  	<input type="reset" value="Reset">
	  	<input type="submit" value="Valider">
		</form>

		<?php
		///Connexion au serveur MySQL
		$link = mysqli_connect("localhost", "root", "", "siteweb")
			or die("Error " . mysqli_error($link));

		///Verification de la connexion
		if (mysqli_connect_errno()) {
			print("Connect failed: \n" . mysqli_connect_error());
			exit();
		}

		//$motscles=$_POST['motscles'];
		///Ecriture de la requête
		//$requete1 = "SELECT * FROM Personne WHERE nom like '%".$motscles."%'";
		if(empty($_POST['numLicence'])) {
			if(isset($_POST['NomJoueur']) && isset($_POST['PrenomJoueur'])) {
				//mise des mots clés dans un tableau splittés par un espace
			    $NomJoueur = $_POST['NomJoueur'];
			    $PrenomJoueur = $_POST['PrenomJoueur'];
			    $requete = "SELECT * FROM Joueur WHERE nom='$NomJoueur' AND prenom='$PrenomJoueur'";

			    ///Execution de la requête sur le serveur
				if( !$resquery=mysqli_query($link, $requete) ){
					die("Error:".mysqli_errno($link).":".mysqli_error($link));
				} else {
					///Traitement de la requête
					while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
						if ($row[0]!="") {
							echo "<b>Numero de licence du joueur</b> : ". $row[0]." </br> <b>Nom du joueur</b> : ". $row[1] . " </br> <b>Prenom du joueur</b> : ". $row[2]."<br />"; 		
						} else {
							echo "Aucun joueur trouvé avec les parametres donnés";
						}
					}
				}
			}
		} else {
			$numLicence = $_POST['numLicence'];
			$requete = "SELECT * FROM Joueur WHERE Num_Licence = '$numLicence'";

			if( !$resquery=mysqli_query($link, $requete) ) {
				die("Error:".mysqli_errno($link).":".mysqli_error($link));
			} else {
				///Traitement de la requête
				while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
					if (mysqli_num_rows($resquery) <> 0) {
						echo "<b>Numero de licence du joueur</b> : ". $row[0]." </br> <b>Nom du joueur</b> : ". $row[1] . " </br> <b>Prenom du joueur</b> : ". $row[2]."<br />"; 		
					} else {
						echo "Aucun joueur trouvé avec les parametres donnés";
					}
				}
			}
		}
		?>
	</body>
</html>