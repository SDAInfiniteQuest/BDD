/* affiche les données concernant un utilisateur */
<?php
	$conn = oci_connect('pallamidessi','','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse($conn,"SELECT * FROM utilisateur WHERE :usr=u.idUtilisateur");
	oci_bind_by_name($stmt,":usr",$_GET[idUtilisateur]);
	oci_execute($stmt,$mode);

	$user=oci_fetch_array($stmt);

	oci_execute($stmt,$mode);
	
echo"
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="style.css">
			<title>BiblioMedia </title>

			<!-- Script de compatibilite html5 pour IE < 9 --!>
			
			<!--[if lt IE 9]>
				<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
			<![endif]-->

		</head>

		<body>
			<div id="none">
			include("header.php"); 
				<div>
					<div>";
					echo "<br/> Identifiant utilisateur: $user['idUtilisateur']"
					echo "<br/> Date de naissance: $user['date_de_naissance']"
					echo "<br/> Nom: $user['nom']"
					echo "<br/> Prenom: $user['prenom']"
					echo "<br/> Adresse: $user['adresse']"
					echo "<br/> E-Mail: $user['mail']"
					echo 			
					"</div>
				</div>
			include("footer.php");
			</div>
		</body>
	</html>
";
?>

