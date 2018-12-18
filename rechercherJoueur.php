<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Recherche de joueur</title>
</head>
<body>
	Veuillez saisir un ou plusieurs mots clés pour effectuer la recherche :<br /><br />
	<form action="rechercherJoueur.php" method="post">
 	Mots-clés:<br>
 	<input type="textarea" name="motscles"><br><br />
  	<input type="reset" value="Reset">
  	<input type="submit" value="Valider">
	</form>
</body>
</html>

<?PHP
	require('config.php');
	//$motscles=$_POST['motscles'];
	///Ecriture de la requête
	if(isset($_POST['motscles'])) {
		//mise des mots clés dans un tableau splittés par un espace
	    $motscles = explode(' ', $_POST['motscles']);
	    //evaluation et filtrage du tableau
	    $jk = array_filter($motscles);
	    $jk = count($jk);
	    //requete splittée par une boucle contenant des concaténations
	    $requete = "SELECT * FROM joueur WHERE Nom = '1' ";
    	for($j=0; $j<$jk; $j++){
       		$requete .= "OR Nom LIKE '%".$motscles[$j]."%' OR Nom LIKE '%".$motscles[$j]."%'";
       	}
    	$requete .= "order by Num_licence DESC";

    	///Execution de la requête sur le serveur
		if( !$resquery=mysqli_query($link, $requete)){
			die("Error:".mysqli_errno($link).":".mysqli_error($link));
		} else {
			///Traitement de la requête
			while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
				$user_image = $row['3'];
    			$repertoire = './images/';
    			?>	<br />
    			<img src="<?php echo $repertoire.$user_image; ?>" alt="" />
    		<?php
				echo "<b>Numéro de licence</b> : ". $row[0] . " | <b>Nom</b> : ". $row[1]. " | <b>Prénom</b> : ". $row[2]. " | <b>Date_naissance</b> : ". $row[4]. " | <b>Taille</b> : ". $row[5]. " | <b>Poids</b> : ". $row[6]. " | <b>Poste préféré</b> : ". $row[7]."<br />";
				?>

				Modification ou suppression du Joueur :
						<br />
						<form action="supprimerUnJoueur.php" method="post">
							<input type="hidden" name="NumLicence" value="<?php echo $row[0]; ?>" />
							<input type="submit" value="Supprimer">
						</form>
						<form action="ModifierJoueur.php" method="get">
							<input type="hidden" name="NumLicence" value="<?php echo $row[0]; ?>" />
							<input type="submit" value="Modifier">
						</form>
						</br>
						<?php 
		}
	}
	}
	
?>