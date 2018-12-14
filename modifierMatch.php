Modification d'un match </br></br></br></br>

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
	
	<?php 
	if (isset($_GET['idMatchmodif'])) {
		$idMatchmodif=$_GET['idMatchmodif'];
	}

	$idMatchtempo=0;
	if (!empty($_GET['idMatch'])) {
		?>

		Vous souhaitez modifier le match : </br>
		<?php 
		 			//Ecriture de la requête
					$idmatch=$_GET['idMatch'];
					$idMatchtempo=$idmatch;
				    $requete = "SELECT * FROM Match_ WHERE id_match='$idmatch'";

				    //Execution de la requête sur le serveur
					if (!$resquery=mysqli_query($link, $requete)) {
						die("Error:".mysqli_errno($link).":".mysqli_error($link));
					} else {
						//Traitement de la requête
						$temp = $resquery;
						while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
								echo "<b>Identifiant du match</b> : ". $row[0]." </br> <b>Date du match</b> : ". $row[1] . " </br> <b>Heure du match</b> : ". $row[2]."<br />"; 
						}
					}	
		?>

		<form action="ModifierMatch.php" method="get">
		</br></br>Nouvelles données :
			<!-- Avant le match -->
			<p>Date du match : <input type="date" name="dateMmod" /></p>
			<p>heure_match : <input type="time" name="heureMmod" /></p>
			<p>Nom equipe adverse : <input type="text" name="nomEAmod" /></p>
			<p>Lieu de rencontre : <input type="text" name="LieuRmod" /></p>	 
			<input type="text" name="idMatchmodif" value="<?php echo $idMatchtempo; ?>" />

			<input name="stock" type="submit" value="Modifier le match">
			 
			 <!-- Apres le match 
			 <p>Resultat : <input type="number" name="Res" /></p>
			 <p>Nombre de buts de notre équipe : <input type="number" name="nbButsE" /></p>
			 <p>Nombre de buts de l'équipe adverse : <input type="number" name="nbButsA" /></p>
			 
			 <p></p>-->
		</form>
	<?php 
	}

	if (isset($_GET['dateMmod']) && isset($_GET['heureMmod']) && isset($_GET['nomEAmod']) && isset($_GET['LieuRmod']) && !empty($_GET['dateMmod']) && !empty($_GET['heureMmod']) && !empty($_GET['nomEAmod']) && !empty($_GET['LieuRmod'])) {

		//htmlentities();
		$dateM=htmlentities($_GET['dateMmod']);
		$heureM=htmlentities($_GET['heureMmod']);
		$nomEA=htmlentities($_GET['nomEAmod']);
		$LieuR=htmlentities($_GET['LieuRmod']);
		
		$idMatchtempo=$_GET['idMatchmodif'];
		///Ecriture de la requête
		echo "identifiant du match à supprimer ".$idMatchtempo;
		$requete = "UPDATE match_ SET Date_match = '$dateM', Heure_match = '$heureM', NomEquipeAdv = '$nomEA', Lieu_rencontre = '$LieuR' WHERE id_match='$idMatchtempo' ;";

		///Execution de la requête sur le serveur
		if( !$resquery=mysqli_query($link,$requete) ){
			die("Error:".mysqli_errno($link).":".mysqli_error($link));
		} else {
			///Traitement de la requête
			echo "Modification Effectuée... !";
			return $resquery;
		}
	}