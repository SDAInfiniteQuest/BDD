<?php
	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt1=oci_parse($conn,"SELECT * FROM livre");
	oci_execute($stmt1,$mode);
	
	$stmt2=oci_parse($conn,"SELECT * FROM album");
	oci_execute($stmt2,$mode);
	
	$stmt3=oci_parse($conn,"SELECT * FROM film");
	oci_execute($stmt3,$mode);
	
	echo'
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="style.css">
				<link rel="stylesheet" href="styleListeobjet.css">
				<title>BiblioMedia </title>

				<!-- Script de compatibilite html5 pour IE < 9 --!>
				
				<!--[if lt IE 9]>
					<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
				<![endif]-->

			</head>

			<body>
			';
				include("header.php");
					echo'
					<div id="main_wrapper">
						<div id="livre">
							<h2>Livre</h2>
						';
							while ($livre=oci_fetch_array($stmt1)) {
								echo'<li><a
								href="objetCulturel.php?idObjet='.$livre['IDOBJET'].'">'.$livre['TITRELIVRE'].'</a><li>';
							}
							
							oci_free_statement($stmt1);
						echo'
						</div>

						<div id="album">
							<h2>Album</h2>
						';
							while ($album=oci_fetch_array($stmt2)) {
								echo'<li><a
								href="objetCulturel.php?idObjet='.$album['IDOBJET'].'">'.$album['TITREALBUM'].'</a><li>';
							}
							oci_free_statement($stmt2);
						echo'
						</div>

						<div id="film">
							<h2>Film</h2>
						';
							while ($film=oci_fetch_array($stmt3)) {
								echo'<li><a
								href="objetCulturel.php?idObjet='.$film['IDOBJET'].'">'.$film['TITREFILM'].'</a><li>';
							}
							
							oci_free_statement($stmt3);
						echo'
						</div>
					</div>
			</body>
			';
			include("footer.php");
		echo'
		</html>
		';
	oci_close($conn);
	?>

