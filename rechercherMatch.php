<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Recherche de contact</title>
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
		///Connexion au serveur MySQL
		//$link = mysqli_connect("localhost", "root", "", "siteweb")
			//or die("Error " . mysqli_error($link));
		
	 	
		try {
    		$dbh = new PDO('mysql:host=localhost;dbname=siteweb', "root", "");
    		foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
		///Verification de la connexion
		/*if (mysqli_connect_errno()) {
			print("Connect failed: \n" . mysqli_connect_error());
			exit();
		}

		//$motscles=$_POST['motscles'];
		///Ecriture de la requête
		//$requete1 = "SELECT * FROM Personne WHERE nom like '%".$motscles."%'";
		if(isset($_POST['dataRecherche'])) {
			//mise des mots clés dans un tableau splittés par un espace
		    $dateRecherchee = $_POST['dataRecherche'];
		    $requete = "SELECT * FROM Match_ WHERE Date_match='$dateRecherchee'";

		    ///Execution de la requête sur le serveur
			if( !$resquery=mysqli_query($link, $requete) ){
				die("Error:".mysqli_errno($link).":".mysqli_error($link));
			} else {
				///Traitement de la requête
				$temp = $resquery;
				
				while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
						echo "<b>Identifiant du match</b> : ". $row[0]." </br> <b>Date du match</b> : ". $row[1] . " </br> <b>Heure du match</b> : ". $row[2]."<br />"; 
							?>
							</br>Suppression d'un match :
							<form action="supprimerUnMatch.php" method="post">
							Identifiant du match : <input type="number" name="idMatch"><br />
							<input type="submit" value="Supprimer">
							</form>
							<?php
					}
					if (mysqli_fetch_array($temp, MYSQLI_NUM)==NULL) {
						echo "pas de match";
					}
				}
		}

		?>
	</body>
</html>