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
				<link rel="stylesheet" href="liste_user.css">
				<title>BiblioMedia </title>

				<!-- Script de compatibilite html5 pour IE < 9 --!>
				
				<!--[if lt IE 9]>
					<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
				<![endif]-->

			</head>

			<body>
			';		
				include("header.php"); 

				echo '<div id="main_wrapper">';
				while(($user=oci_fetch_array($listeUtilisateurs))!=FALSE)
				{
					echo '<div>	<ul>';
						echo "<li> Pseudo:		".$user['PSEUDO'].'<li>';
						echo "<li> Date de naissance: ".$user['DATE_DE_NAISSANCE'];
						echo "<li> Nom:				".$user['NOM'];
						echo "<li> Prénom:		".$user['PRENOM'];
						echo "<li/> E-Mail:		".$user['MAIL'];
					echo '</p> </div>';
				}
				oci_free_statement($listeUtilisateurs);
				oci_close($conn);
				echo '</div>';

				include("footer.php");
				
				echo'
			</body>
		</html>
	';
?>
