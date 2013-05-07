


<?php

	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse($conn,"SELECT * FROM LISTEOBJET WHERE idListe=:idl");
	oci_bind_by_name($stmt,":idl",$_GET['id_liste']);
	oci_execute($stmt,$mode);

	$liste=oci_fetch_row($stmt);

	oci_execute($stmt,$mode);
	
	if ($liste[1]==='LIVRE') {
		$stmt=oci_parse($conn,'SELECT	ob.date_sortie,ob.genre,li.style,li.collection,li.titreLivre,li.idObjet	FROM OBJETCULTUREL ob,LIVRE li WHERE li.idObjet=ob.idObjet AND li.idObjet IN (SELECT ap.idObjet FROM APPARTIENTLISTE ap WHERE :idl=ap.idListe)');
		oci_bind_by_name($stmt,":idl",$_GET['id_liste']);
		oci_execute($stmt,$mode);
	}
	else if($liste[1]==='FILM'){
		$stmt=oci_parse($conn,"SELECT	ob.date_sortie,ob.genre,fi.titreFilm,fi.idObjet FROM OBJETCULTUREL ob,FILM fi WHERE fi.idObjet=ob.idObjet AND fi.idObjet IN ( SELECT 	ap.idObjet FROM APPARTIENTLISTE ap WHERE :idl=ap.idListe)");
		oci_bind_by_name($stmt,":idl",$_GET['id_liste']);
		oci_execute($stmt,$mode);
	}
	else if($liste[1]==='ALBUM'){
		$stmt=oci_parse($conn,"SELECT	ob.date_sortie,ob.genre,ab.titreAlbum,ab.idObjet FROM OBJETCULTUREL	ob,ALBUM ab WHERE ob.idObjet=ab.idObjet AND ab.idOjet IN (SELECT ap.idObjet FROM APPARTIENTLISTE ap WHERE :idl=ap.idListe))");
		oci_bind_by_name($stmt,":idl",$_GET['id_liste']);
		oci_execute($stmt,$mode);
	}

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
		';
		include("header.php"); 
		
		echo'
		<body>
			<div id="main_wrapper">
			

				
				<div id="description_list">
					';
						echo"
						<p>
						<h2>$liste[2]</h2>
					</p>
				</div>
				";
				echo'
				<div id="list">
					<p>
					';
					if ($liste[1]==='LIVRE') {
						while (($objet=oci_fetch_row($stmt))!=FALSE) {
							echo
							"<br/>Titre :$objet[4]
							<br/>Collection:$objet[3]
							<br/>Style:$objet[2]
							<br/>Genre:$objet[1]
							<br/>Date de parution,$objet[0]
							";


							$desc=oci_parse($conn,"SELECT description_objet,date_desc	FROM ESTDECRITDANS WHERE ESTDECRITDANS.idListe=i:idl and ESTDECRITDANS.idObjet= :obj ");
							oci_bind_by_name($desc,":idl",$_GET['id_liste']);
							oci_bind_by_name($desc,":obj",$objet[5]);
							oci_execute($desc,$mode);
							
							while (($comment=oci_fetch_array($desc))!=FALSE) {
								echo
								"<br/>Date du commentaire:$comment[date_desc]
								<br/> Description:$comment[description_objet]
								";
							}
						}
					}
					if ($liste[1]==='ALBUM') {
						
						while (($objet=oci_fetch_row($stmt))!=FALSE) {
							echo
							"<br/>Titre :$objet[2]
							<br/>Genre,$objet[1]
							<br/>Date de parution,$objet[0];
							";	
							$desc=oci_parse($conn,"SELECT description_objet,date_desc	FROM ESTDECRITDANS WHERE ESTDECRITDANS.idListe=:idl and	ESTDECRITDANS.idObjet=:obj");
							oci_bind_by_name($desc,":idl",$_GET['id_liste']);
							oci_bind_by_name($desc,":obj",$objet[3]);
							oci_execute($desc,$mode);
							
							while (($comment=oci_fetch_array($desc))!=FALSE) {
								echo
								"<br/>Date du commentaire:$comment[date_desc]
								<br/> $comment[description_objet]
								";
							}
							
						}
					}
					if ($liste[1]==='FILM') {
						
						while (($objet=oci_fetch_row($stmt))!=FALSE) {
							echo
							"<br/>Titre :$objet[2]
							<br/>Genre,$objet[1]
							<br/>Date de parution,$objet[0]
							";
							$desc=oci_parse($conn,"SELECT description_objet,date_desc	FROM ESTDECRITDANS WHERE ESTDECRITDANS.idListe=:idl and	ESTDECRITDANS.idObjet=:obj");
							oci_bind_by_name($desc,":idl",$_GET['id_liste']);
							oci_bind_by_name($desc,":obj",$objet[3]);
							oci_execute($desc,$mode);
							
							while (($comment=oci_fetch_array($desc))!=FALSE) {
								echo
								"<br/>Date du commentaire:$comment[date_desc]
								<br/> $comment[description_objet]
								";
							}
						}
					}
					echo'
					</p>	
				</div>
				
				<div id="list_comment">
				

				</div>
			
			</div>
		</body>
		';
		include("footer.php"); 
	echo'
	</html>
	';
	oci_close($conn)
?>
