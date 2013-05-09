<?php
	$conn = oci_connect('pallamidessi','','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse($conn,"SELECT * FROM utilisateur WHERE :usr=idUtilisateur");
	oci_bind_by_name($stmt,":usr",$_GET['idUtilisateur']);
	oci_execute($stmt,$mode);

	$user=oci_fetch_array($stmt);

	$stmt2=oci_parse($conn,"SELECT l.NOMLISTE,l.IDLISTE FROM CREELISTE cl,LISTEOBJET l WHERE :usr=cl.idUtilisateur AND cl.idListe=l.idListe");
	oci_bind_by_name($stmt2,":usr",$_GET['idUtilisateur']);
	oci_execute($stmt2,$mode);

echo'
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
		';
			include("header.php"); 
				echo'<div id="main_wrapper">';
					echo'<div id="user_data">';
						echo "<br/> Date de naissance:".$user['DATE_DE_NAISSANCE'];
						echo "<br/> Nom:".$user['NOM'];
						echo "<br/> Prenom:".$user['PRENOM'];
						echo "<br/> E-Mail:".$user['MAIL'];
					echo"</div>";

					echo'
							<div id="list_from_user">
								<h3>Liste creer par '.$user['PSEUDO'].'</h3>
								<ul>
								';
								while ($liste=oci_fetch_array($stmt2)) {
									echo'<li><a href="liste.php?id_liste='.$liste['IDLISTE'].'">'.$liste['NOMLISTE'].'</a></li>';
								}
								echo'
								</ul>
							</div>
					</div>"
		</body>
		';
		include("footer.php");
	echo'
	</html>
	';

?>

