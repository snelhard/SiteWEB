Modification d'un joueur </br></br></br></br>

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
	if (isset($_GET['NumLicencemodif'])) {
		$NumLicencemodif=$_GET['NumLicencemodif'];
	}

	$numLicencetempo=0;
	if (!empty($_GET['NumLicence'])) {
		?>

		Vous souhaitez modifier le match : </br>
		<?php 
		 			//Ecriture de la requête
					$numlicence=$_GET['NumLicence'];
					$numLicencetempo=$numlicence;
				    $requete = "SELECT * FROM joueur WHERE Num_licence='$numlicence'";

				    //Execution de la requête sur le serveur
					if (!$resquery=mysqli_query($link, $requete)) {
						die("Error:".mysqli_errno($link).":".mysqli_error($link));
					} else {
						//Traitement de la requête
						$temp = $resquery;
						while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
								echo "<b>Numero de licence du joueur</b> : ". $row[0]." </br> <b>Nom du joueur</b> : ". $row[1] . " </br> <b>Prénom du joueur</b> : ". $row[2]."<br />"; 
						}
					}	
		?>

		<form action="ModifierJoueur.php" method="get">
		</br></br>Nouvelles données :
			<!-- Avant le match -->
			<p>Numero de licence : <input type="number" name="numLic" /></p>
			<p>Nom du joueur : <input type="text" name="NomJ" /></p>
			<p>Prenom du joueur : <input type="text" name="PreJ" /></p>
			<p>Photo : <input type="browse" name="Photo" /></p>
			<p>Date_de_naissance : <input type="date" name="dateN" /></p>
			<p>Taille : <input type="text" name="taille" /></p>
			<p>Poids : <input type="text" name="poids" /></p>	 
			<p>Poste préféré : <input type="text" name="postePref" /></p>
			<input type="hidden" name="NumLicencemodif" value="<?php echo $numLicencetempo; ?>" />

			<input name="stock" type="submit" value="Modifier le Joueur">
			 
		</form>
	<?php 
	}

	if (isset($_GET['numLic']) && isset($_GET['taille']) && isset($_GET['poids']) && isset($_GET['dateN']) && isset($_GET['postePref']) && isset($_GET['NomJ']) && isset($_GET['PreJ']) && isset($_GET['Photo']) && !empty($_GET['numLic']) && !empty($_GET['NomJ']) && !empty($_GET['PreJ']) && !empty($_GET['Photo']) && !empty($_GET['dateN']) && !empty($_GET['taille']) && !empty($_GET['poids']) && !empty($_GET['postePref'])) {

		//htmlentities();
		$numLic=htmlentities($_GET['numLic']);
		$nomJ=htmlentities($_GET['NomJ']);
		$preJ=htmlentities($_GET['PreJ']);
		$photo=htmlentities($_GET['Photo']);
		$dateN=htmlentities($_GET['dateN']);
		$taille=htmlentities($_GET['taille']);
		$poids=htmlentities($_GET['poids']);
		$postePref=htmlentities($_GET['postePref']);
		
		$numLicencetempo=$_GET['NumLicencemodif'];
		///Ecriture de la requête
		echo "identifiant du joueur à modifier ".$numLicencetempo;
		$requete = "UPDATE joueur SET Num_licence = '$numLic', Nom = '$nomJ', Prenom = '$preJ', Photo = '$photo', Date_de_naissance = '$dateN', Taille = '$taille', Poids = '$poids', Pref_Poste = '$postePref' WHERE Num_licence='$numLicencetempo' ;";

		///Execution de la requête sur le serveur
		if( !$resquery=mysqli_query($link,$requete) ){
			die("Error:".mysqli_errno($link).":".mysqli_error($link));
		} else {
			///Traitement de la requête
			echo "Modification Effectuée... !";
			return $resquery;
		}
	}