
<?php
	
	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
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
					
					
					//<div>
					
					if(($s=oci_fetch_array($stmt1))) 
					{
						echo "<p>"; 
						echo "<br/> STYLE:".$s['STYLE'];
						echo "<br/> COLLECTION:".$s['COLLECTION'];
						echo "<br/> TITRE:".$s['TITRELIVRE'];
						echo "</p>";

						$stmt1=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT
						idPersonne
						FROM ECRIT WHERE:args=idObjet)");
						oci_bind_by_name($stmt1,":args",$_GET['idObjet']);
						oci_execute($stmt1,$mode);
						
						echo"<p> Ecrivain :<br/>";

						while($p=oci_fetch_array($stmt1)){
							echo "<br/> NOM:".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:".$p['PRENOMPERSONNE'];
							echo "<br/>";
						}

						echo"</p>";
					}
					else if(($s=oci_fetch_array($stmt2))) 
					{
						echo "<p>"; 
						echo "<br/> TITRE:".$s['TITREALBUM'];
						echo "</p>";

						$stmt2=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT 
						idPersonne FROM CREE WHERE:args=idObjet)");
						oci_bind_by_name($stmt2,":args",$_GET['idObjet']);
						oci_execute($stmt2,$mode);
						
						echo"<p> MUSICIEN :<br/>";
						while($p=oci_fetch_array($stmt2)){
							echo "<br/> NOM:".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:".$p['PRENOMPERSONNE'];
							echo "<br/>";
						}
						echo"</p>";

					}
					else if(($s=oci_fetch_array($stmt3))) 
					{
						echo "<br/> TITRE:".$s['TITREFILM'];
						echo "</p>";

						$stmt3=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT
						idPersonne FROM JOUEDANS WHERE:args=idObjet)");
						oci_bind_by_name($stmt3,":args",$_GET['idObjet']);
						oci_execute($stmt3,$mode);
						
						echo"<p> ACTEUR :<br/>";
						while($p=oci_fetch_array($stmt3)){
							echo "<br/> NOM:".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:".$p['PRENOMPERSONNE'];
							
							$role=oci_parse($conn,"SELECT * FROM JOUEDANS WHERE idPersonne= :idp ");
							oci_bind_by_name($role,":idp",$p['IDPERSONNE']);
							oci_execute($role,$mode);
							
							echo "<br/> ROLE:".$role['ROLE'];
							
							echo "<br/>";
						}
						echo"</p>";
						
						$stmt3=oci_parse($conn,"SELECT * FROM PERSONNE  WHERE idPersonne IN (SELECT
						idPersonne FROM REALISE WHERE:args=idObjet)");
						oci_bind_by_name($stmt3,":args",$_GET['idObjet']);
						oci_execute($stmt3,$mode);
						
						echo"<p> REALISATEUR :<br/>";
						while($p=oci_fetch_array($stmt3)){
							echo "<br/> NOM:".$p['NOMPERSONNE'];
							echo "<br/> PRENOM:".$p['PRENOMPERSONNE'];
							echo "<br/>";
						}
						echo"</p>";
					}


				echo'
				</div>
			</div>
			';
			include("footer.php"); 
		echo'
		</body>
	</html>
	';
?>
