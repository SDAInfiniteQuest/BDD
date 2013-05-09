
<?php
	
	$conn = oci_connect('pallamidessi','XXX','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;

	$stmt1=oci_parse($conn,"SELECT * FROM livre WHERE :args=idObjet");
	oci_bind_by_name($stmt1,":args",$_GET['idObjet']);
	oci_execute($stmt1,$mode);
	
	$stmt2=oci_parse($conn,"SELECT * FROM album WHERE :args=idObjet");
	oci_bind_by_name($stmt2,":args",$_GET['idObjet']);
	oci_execute($stmt2,$mode);
	
	$stmt3=oci_parse($conn,"SELECT * FROM film WHERE :args=idObjet");
	oci_bind_by_name($stmt3,":args",$_GET['idObjet']);
	oci_execute($stmt3,$mode);

	echo'
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" href="style.css">
				<link rel="stylesheet" href="styleObjet.css">
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
				';
					
					
					echo'<div id="list">';
					
					if(($s=oci_fetch_array($stmt1))) 
					{
						echo "<h1>							".$s['TITRELIVRE']."</h1>";
						echo "<p>"; 
						echo "<br/> STYLE:			".$s['STYLE'];
						echo "<br/> COLLECTION:	".$s['COLLECTION'];
						echo "</p>";

						oci_free_statement($stmt1);
						$stmt1=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT
						idPersonne
						FROM ECRIT WHERE:args=idObjet)");
						oci_bind_by_name($stmt1,":args",$_GET['idObjet']);
						oci_execute($stmt1,$mode);
						
						echo"<h2>AUTEUR:</h2> <p>";

						while($p=oci_fetch_array($stmt1)){
							echo "<br/> NOM:		".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:	".$p['PRENOMPERSONNE'];
							echo "<br/>";
						}
						oci_free_statement($stmt1);
						echo"</p>";
					}
					else if(($s=oci_fetch_array($stmt2))) 
					{
						echo "<h1>".$s['TITREALBUM'].'</h1>';

						oci_free_statement($stmt2);
						$stmt2=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT 
						idPersonne FROM CREE WHERE:args=idObjet)");
						oci_bind_by_name($stmt2,":args",$_GET['idObjet']);
						oci_execute($stmt2,$mode);
						
						echo"<h2>MUSICIEN :</h2><p>";
						while($p=oci_fetch_array($stmt2)){
							echo "<br/> NOM:			".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:		".$p['PRENOMPERSONNE'];
							echo "<br/>";
						}
						oci_free_statement($stmt1);
						echo"</p>";

					}
					else if(($s=oci_fetch_array($stmt3))) 
					{
						echo "<h1>".$s['TITREFILM'].'</h1>';

						oci_free_statement($stmt3);
						$stmt3=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT
						idPersonne FROM JOUEDANS WHERE:args=idObjet)");
						oci_bind_by_name($stmt3,":args",$_GET['idObjet']);
						oci_execute($stmt3,$mode);
						
						echo"<h2> ACTEUR :</h2><p> ";
						while($p=oci_fetch_array($stmt3)){
							echo "<br/> NOM:			".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:		".$p['PRENOMPERSONNE'];
							
							$role=oci_parse($conn,"SELECT * FROM JOUEDANS WHERE idPersonne= :idp ");
							oci_bind_by_name($role,":idp",$p['IDPERSONNE']);
							oci_execute($role,$mode);
							
							echo "<br/> ROLE:".$role['ROLE'];
							
							echo "<br/>";
							oci_free_statement($role);
						}
						oci_free_statement($stmt3);
						echo"</p>";
						
						$stmt3=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT
						idPersonne FROM REALISE WHERE:args=idObjet)");
						oci_bind_by_name($stmt3,":args",$_GET['idObjet']);
						oci_execute($stmt3,$mode);
						
						echo"<h2> REALISATEUR :</h2><p>";
						while($p=oci_fetch_array($stmt3)){
							echo "<br/> NOM:		".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:	".$p['PRENOMPERSONNE'];
							echo "<br/>";
						}
						oci_free_statement($stmt3);
						echo"</p>";
					}


				echo'
					</div>
				</div>
			</div>
			';
			include("footer.php"); 
		echo'
		</body>
	</html>
	';
	oci_close($conn);
?>
