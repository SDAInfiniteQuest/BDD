/* recupere un idObjet culturel en Get */

<?php
$conn = oci_connect('pallamidessi','xxx','localhost:1521/ROSA');
$mode =	OCI_COMMIT_ON_SUCCESS;

$stmt=oci_parse("SELECT idObjet FROM objetculturel WHERE $_GET['idObjet']==idObjet");
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
				<div>";

echo "<div>";

if(($s=oci_parse("select * from LIVRE l where $stmt=l.idObjet"))) 
{
	echo "<p>"; 
	oci_execute($s,$mode);
	$ar=oci_fetch_array($s);
	echo "<br/> AUTEUR: $ar['auteurLivre']";
	echo "<br/> STYLE: $ar['styleLivre']";
	echo "<br/> COLLECTION: $ar['collection']";
	echo "<br/> TITRE: $ar['titre']";
	echo "</p>";
	break;
}
else if(($s=oci_parse("select * from FILM f where f.idObjet=$stmt"))) 
{
	echo "<p>"; 
	oci_execute($s,$mode);
	$ar=oci_fetch_array($s);
	echo "<br/> REALISATEUR: $ar['realisateurID']";
	echo "<br/> ACTEUR PRINCIPAL: $ar['acteurID']";
	echo "<br/> TITRE: $ar['titre']";
	echo "</p>";
	break;
}
else(($s=oci_parse("select * from ALBUM a where a.idObjet=$stmt"))) 
{
	echo "<p>"; 
	oci_execute($s,$mode);
	$ar=oci_fetch_array($s);
	echo "<br/> AUTEUR: $ar['auteursAlbum']";
	echo "<br/> TITRE: $ar['titre']";
	echo "</p>";
	break;
}

echo "</div>";

echo
			"</div>
		include("footer.php"); 
		</div>
	</body>
</html>
";
?>
