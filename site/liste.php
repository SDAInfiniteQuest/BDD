/* prend une liste id*/


<?php>
	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse("SELECT * FROM LISTEOBJET WHERE $_POST['id_liste']");
	oci_execute($stmt,$mode);

	$liste=oci_fetch_row($stmt);

	$stmt=oci_parse("SELECT * FROM OBJETCULTUREL WHERE idObjet IN (SELECT APPARTIENTLISTE.idObjet FROM APPARTIENTLISTE,LISTEOBJET where
	LISTEOBJET.idListe==APPARTIENTLISTE.idListe)");
	oci_execute($stmt,$mode);
	
	if ($liste[2]==='LIVRE') {
		$stmt=oci_parse("SELECT OBJETCULTUREL.date,OBJETCULTUREL.genre,LIVRE.style,LIVRE.collection,Livre.titreLivre	
										FROM OBJETCULTUREL,LIVRE 
										WHERE LIVRE.idOjet=(SELECT idObjet 
																				FROM OBJETCULTUREL 
																				WHERE idObjet IN 
																											(SELECT APPARTIENTLISTE.idObjet 
																											FROM APPARTIENTLISTE,LISTEOBJET 
																											WHERE LISTEOBJET.idListe==APPARTIENTLISTE.idListe));");

		oci_execute($stmt,$mode);
		
	}
	else if($liste[2]==='FILM'){
		$stmt=oci_parse("SELECT OBJETCULTUREL.date,OBJETCULTUREL.genre,FILM.titreLivre	
										FROM OBJETCULTUREL,FILM 
										WHERE FILM.idOjet=(SELECT idObjet 
																				FROM OBJETCULTUREL 
																				WHERE idObjet IN 
																											(SELECT APPARTIENTLISTE.idObjet 
																											FROM APPARTIENTLISTE,LISTEOBJET 
																											WHERE LISTEOBJET.idListe==APPARTIENTLISTE.idListe));");
		oci_execute($stmt,$mode);
		
	}
	else if($liste[2]==='ALBUM'){
		$stmt=oci_parse("SELECT OBJETCULTUREL.date,OBJETCULTUREL.genre,ALBUM.titreLivre	
										FROM OBJETCULTUREL,ALBUM
										WHERE ALBUM.idOjet=(SELECT idObjet 
																				FROM OBJETCULTUREL 
																				WHERE idObjet IN 
																											(SELECT APPARTIENTLISTE.idObjet 
																											FROM APPARTIENTLISTE,LISTEOBJET 
																											WHERE LISTEOBJET.idListe==APPARTIENTLISTE.idListe));");
		oci_execute($stmt,$mode);
	}

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
			<div id="main_wrapper">
			
			include("header.php"); 
				
				<div id="description_list">
					<p>
						<h2>$liste[3]</h2>
			
					</p>
				</div>
				
				<div id="list">
				<p>
				";
				if (liste[2]==='LIVRE') {
					while (($objet=oci_fetch_row($stmt))!=FALSE) {
						echo
						"<br/>Titre :$objet[1],
						<br/>Collection:$objet[],
						<br/>Style:$objet[],
						<br/>Genre',$objet[],
						<br/>','Date
						de parution',$objet[];
						<>
					}
					
				}
				if (liste[2]==='ALBUM') {
					while (($objet=oci_fetch_row($stmt))!=FALSE) {
						echo $objet[]	
					}
				}
				if (liste[2]==='FILM') {
					while (($objet=oci_fetch_row($stmt))!=FALSE) {
						echo $objet[]	
					}
				}
				
				</div>
				
				<div id="list_comment">
				

				','				
				</div>

				include("footer.php"); 

			</div>
		</body>
	</html>
';
?>
