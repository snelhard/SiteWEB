Veuillez remplir toutes les cases afin de creer un match
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
?>


<form action="creerMatch.php" method="post">
 <!-- Avant le match -->
 <p>Date du match : <input type="date" name="dateM" /></p>
 <p>heure_match : <input type="time" name="heureM" /></p>
 <p>Nom equipe adverse : <input type="text" name="nomEA" /></p>
 <p>Lieu de rencontre : <input type="text" name="LieuR" /></p>

 <input name="stock" type="submit" value="Envoyer">
 
 <!-- Apres le match 
 <p>Resultat : <input type="number" name="Res" /></p>
 <p>Nombre de buts de notre équipe : <input type="number" name="nbButsE" /></p>
 <p>Nombre de buts de l'équipe adverse : <input type="number" name="nbButsA" /></p>
 
 <p></p>-->
</form>


<?php 
// Vérification de la saisit des informations, on ne verifie pas la photo, l'entraineur pourrait l'ajouter ulterierement
	if (isset($_POST['dateM']) && isset($_POST['heureM']) && isset($_POST['nomEA']) && isset($_POST['LieuR'])) {
		
		//htmlentities();
		$dateM=htmlentities($_POST['dateM']);
		$heureM=htmlentities($_POST['heureM']);
		$nomEA=htmlentities($_POST['nomEA']);
		$LieuR=htmlentities($_POST['LieuR']);
		

		///Ecriture de la requête
		$requete = "INSERT INTO match_ (Date_match, Heure_match, NomEquipeAdv, Lieu_rencontre)
		VALUES ('$dateM', '$heureM', '$nomEA', '$LieuR')";

		///Execution de la requête sur le serveur
		if( !$resquery=mysqli_query($link,$requete) ){
			die("Error:".mysqli_errno($link).":".mysqli_error($link));
		} else {
			///Traitement de la requête
			echo "Inscription validée... !";
			return $resquery;
		}
	}
?>