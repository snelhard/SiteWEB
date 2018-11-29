Veuillez remplir toutes les cases afin d'ajouter un joueur à l'équipe.
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


<form action="ajouterJoueur.php" method="post">
 <p>Numéro de licence : <input type="number" name="numLicJ" /></p>
 <p>Nom : <input type="text" name="nomJ" /></p>
 <p>Prénom : <input type="text" name="prenomJ" /></p>
 <p>Photo : <input type="text" name="photoJ" /></p>
 <p>Date de naissance : <input type="date" name="naissanceJ" /></p>
 <p>Taille : <input type="number" name="tailleJ" /></p>
 <p>Poids : <input type="number" name="poidsJ" /></p>
 <p>Poste préféré : <input type="text" name="PfJ" /></p>
 <p>Adresse mail : <input type="email" name="mailJ" /></p>
 <p><input name="stock" type="submit" value="Envoyer"></p>
</form>


<?php 
// Vérification de la saisit des informations, on ne verifie pas la photo, l'entraineur pourrait l'ajouter ulterierement
	if (isset($_POST['numLicJ']) && isset($_POST['nomJ']) && isset($_POST['prenomJ']) && isset($_POST['naissanceJ']) && isset($_POST['tailleJ']) && isset($_POST['poidsJ']) && isset($_POST['PfJ']) && isset($_POST['mailJ'])) {
		
		//htmlentities();
		$numLicJ=htmlentities($_POST['numLicJ']);
		$nomJ=htmlentities($_POST['nomJ']);
		$prenomJ=htmlentities($_POST['prenomJ']);
		$naissanceJ=htmlentities($_POST['naissanceJ']);
		$tailleJ=htmlentities($_POST['tailleJ']);
		$PoidsJ=htmlentities($_POST['poidsJ']);
		$pfJ=htmlentities($_POST['PfJ']);
		$mailJ=htmlentities($_POST['mailJ']);

		///Ecriture de la requête
		$requete = "INSERT INTO joueur (Num_licence, nom, prenom, Date_de_naissance, Taille, Poids, Pref_Poste, Adresse_mail)
		VALUES ('$numLicJ', '$nomJ', '$prenomJ', '$naissanceJ', '$tailleJ', '$PoidsJ', '$pfJ', '$mailJ')";

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