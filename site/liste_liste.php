<?php

	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');

	$liste_film=oci_parse($conn,"SELECT * FROM LISTEOBJET WHERE typeListe LIKE 'FILM' ");
	oci_execute($liste_film);

	$liste_album=oci_parse($conn,"SELECT * FROM LISTEOBJET WHERE typeListe LIKE 'ALBUM'");
	oci_execute($liste_album);
	
	$liste_livre=oci_parse($conn,"SELECT * FROM LISTEOBJET WHERE typeListe LIKE 'LIVRE'");
	oci_execute($liste_livre);;
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

				echo'	
				<div id="main_wrapper">
					<div id="liste_film">
						<h2>Film</h2>
						<nav>
							<ul>
						';

							while (($elem=oci_fetch_array($liste_film))!=FALSE){
								echo'<li><a href="';
								echo'liste.php?id_liste=';
								echo $elem['IDLISTE'];
								echo'">';
								echo $elem['NOMLISTE'];
								echo'</a><li>';
							}

							oci_free_statement($liste_film);
							echo'
							</ul>
						</nav>
					</div>

					<div id="liste_musique">
						<h2>Musique</h2>
						<nav>
							<ul>
						';
							while (($elem=oci_fetch_array($liste_album))!=FALSE){
								echo'<li><a href="liste.php?id_liste='.$elem['IDLISTE'].'">'.$elem['NOMLISTE'].'</a><li>';
							}
							oci_free_statement($liste_album);

							echo'
							</ul>
						</nav>
					</div>

					<div id="liste_livre">
						<h2>Livre</h2>
						<nav>
							<ul>
						';
							while (($elem=oci_fetch_array($liste_livre))!=FALSE){
								echo'<li><a href="liste.php?id_liste='.$elem['IDLISTE'].'">'.$elem['NOMLISTE'].'</a><li>';
							}
							oci_free_statement($liste_livre);
							oci_close($conn);	
							echo'
							</ul>
						</nav>
					</div>
					

				</div>
				';
				include("footer.php");
			
			echo'
			</body>
		</html>
		';
	
?>
