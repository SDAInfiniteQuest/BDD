


<?php

	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse($conn,"SELECT * FROM LISTEOBJET WHERE idListe=$_GET[id_liste]");
	oci_execute($stmt,$mode);

	$liste=oci_fetch_row($stmt);

	oci_execute($stmt,$mode);
	
	if ($liste[2]==='LIVRE') {
		$stmt=oci_parse($conn,"SELECT ob.date,ob.genre,li.style,li.collection,li.titreLivre,li.idObjet FROM OBJETCULTUREL ob,LIVRE li WHERE li.idOjet=(SELECT ob2.idObjet FROM OBJETCULTUREL ob2 WHERE ob2.idObjet IN (SELECT ap.idObjet FROM APPARTIENTLISTE ap,LISTEOBJET lio WHERE lio.idListe==ap.idListe))");

		oci_execute($stmt,$mode);
		
	}
	else if($liste[2]==='FILM'){
		$stmt=oci_parse($conn,"SELECT ob.date,ob.genre,fi.titreFilm,fi.idObjet FROM OBJETCULTUREL ob,FILM fi WHERE fi.idOjet=(SELECT ob2.idObjet FROM OBJETCULTUREL ob2 WHERE ob2.idObjet IN (SELECT ap.idObjet FROM APPARTIENTLISTE ap,LISTEOBJET lio WHERE lio.idListe==ap.idListe))");
		oci_execute($stmt,$mode);
		
	}
	else if($liste[2]==='ALBUM'){
		$stmt=oci_parse($conn,"SELECT ob.date,ob.genre,ab.titreAlbum,ab.idObjet FROM OBJETCULTUREL ob,ALBUM ab WHERE ab.idOjet=(SELECT ob2.idObjet FROM OBJETCULTUREL ob2 WHERE ob2.idObjet IN (SELECT ap.idObjet FROM APPARTIENTLISTE ap ,LISTEOBJET lio WHERE lio.idListe==ap.idListe))");
		oci_execute($stmt,$mode);
	}

	echo"
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=\"utf-8\" />
			<link rel=\"stylesheet\" href=\"style.css\">
			<title>BiblioMedia </title>

			<!-- Script de compatibilite html5 pour IE < 9 --!>
			
			<!--[if lt IE 9]>
				<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
			<![endif]-->

		</head>

		<body>
			<div id=\"main_wrapper\">
		";

			include("header.php"); 
				
				echo"
				<div id=\"description_list\">
					<p>
						<h2>$liste[3]</h2>
			
					</p>
				</div>
				
				<div id=\"list\">
					<p>
					";
					if ($liste[2]==='LIVRE') {
						while (($objet=oci_fetch_row($stmt))!=FALSE) {
							echo
							"<br/>Titre :$objet[5]
							<br/>Collection:$objet[4]
							<br/>Style:$objet[3]
							<br/>Genre,$objet[2]
							<br/>Date de parution',$objet[1];
							";


							$stmt=oci_parse($conn,"SELECT description_objet,date_desc FROM ESTDECRITDANS WHERE ESTDECRITDANS.idListe=$_GET[id_liste] and ESTDECRITDANS.idObjet=$objet[6];");

							oci_execute($stmt,$mode);
							
							while (($comment=oci_fetch_array($stmt))!=FALSE) {
								echo
								"<br/>Date du commentaire:$comment[date_desc]
								<br/> $comment[description_objet]
								";
							}
						}
					}
					if ($liste[2]==='ALBUM') {
						
						while (($objet=oci_fetch_row($stmt))!=FALSE) {
							echo
							"<br/>Titre :$objet[3]
							<br/>Genre,$objet[2]
							<br/>Date de parution',$objet[1];
							";	
							$stmt=oci_parse($conn,"SELECT description_objet,date_desc FROM ESTDECRITDANS WHERE ESTDECRITDANS.idListe=$_GET[id_liste] and ESTDECRITDANS.idObjet=$objet[4]");
							

							oci_execute($stmt,$mode);
							
							while (($comment=oci_fetch_array($stmt))!=FALSE) {
								echo
								"<br/>Date du commentaire:$comment[date_desc]
								<br/> $comment[description_objet]
								";
							}
							
						}
					}
					if ($liste[2]==='FILM') {
						
						while (($objet=oci_fetch_row($stmt))!=FALSE) {
							echo
							"<br/>Titre :$objet[3]
							<br/>Genre,$objet[2]
							<br/>Date de parution',$objet[1];
							";
							$stmt=oci_parse($conn,"SELECT description_objet,date_desc FROM ESTDECRITDANS WHERE ESTDECRITDANS.idListe=$_GET[id_liste] and ESTDECRITDANS.idObjet=$objet[4]");

							oci_execute($stmt,$mode);
							
							while (($comment=oci_fetch_array($stmt))!=FALSE) {
								echo
								"<br/>Date du commentaire:$comment[date_desc]
								<br/> $comment[description_objet]
								";
							}
						}
					}
					echo"
					</p>	
				</div>
				
				<div id=\"list_comment\">
				

				</div>
				";

				include("footer.php"); 
			
			echo "
			</div>
		</body>
	</html>
";

?>
