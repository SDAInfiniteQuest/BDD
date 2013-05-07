<?php
	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');

	$listeUtilisateurs=oci_parse($conn,"select * from utilisateur");

	oci_execute($listeUtilisateurs);

	echo'
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="style.css">
				<link rel="stylesheet" href="liste_liste.css">
				<title>BiblioMedia </title>

				<!-- Script de compatibilite html5 pour IE < 9 --!>
				
				<!--[if lt IE 9]>
					<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
				<![endif]-->

			</head>

			<body>
			';		
				include("header.php"); 

				echo '<div>';
				while($elem=oci_fetch_array($listeUtilisateurs)!=FALSE)
				{
					echo '<div>	<p>';
						echo "<br/> Identifiant utilisateur: $user['idUtilisateur']"
						echo "<br/> Pseudo: $user['pseudo']"
						echo "<br/> Date de naissance: $user['date_de_naissance']"
						echo "<br/> Nom: $user['nom']"
						echo "<br/> Prenom: $user['prenom']"
						echo "<br/> Adresse: $user['adresse']"
						echo "<br/> E-Mail: $user['mail']"
					echo '</p> </div>';
				}
				echo '</div>';

				include("footer.php");
	echo'
			</body>
		</html>
	';
?>
