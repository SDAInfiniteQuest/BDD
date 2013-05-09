<?php

	if(!(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['pseudo']) &&
		empty($_POST['date_naissance']) && empty($_POST['adresse']) &&
		empty($_POST['mail']) && empty($_POST['passw1']) && empty($_POST['passw2']))){
	
		header('Location: inscription.php');
	}

	if ($_POST['passw1']!=$_POST['passw2']) {
		echo "<p>erreur mot de passe different</p>";
		header('Location: inscription.php');
	}
	else {
		$conn = oci_connect('pallamidessi','XXX','localhost:1521/ROSA');
	
		$stmt=oci_parse($conn,'SELECT max(idUtilisateur) FROM UTILISATEUR');
		oci_execute($stmt);

		$id_max=oci_fetch_row($stmt);
		oci_free_statement($stmt);

		$id_max=$id_max[0]+1;
		$stmt=oci_parse($conn,"INSERT INTO UTILISATEUR
		VALUES(:id, to_date(:date_vb,'YYYY/MM/DD'), :pseudo, :nom, :prenom, :mail_, :passw1)");
		
		oci_bind_by_name($stmt,":id",$id_max);
		oci_bind_by_name($stmt,":date_vb",$_POST['date_naissance']);
		oci_bind_by_name($stmt,":pseudo",$_POST['pseudo']);
		oci_bind_by_name($stmt,":nom",$_POST['nom']);
		oci_bind_by_name($stmt,":prenom",$_POST['prenom']);
		oci_bind_by_name($stmt,":mail_",$_POST['mail']);
		oci_bind_by_name($stmt,":passw1",$_POST['passw1']);
		
		oci_execute($stmt);
		oci_free_statement($stmt);
		oci_commit($conn);
		oci_close($conn);
	}

?>

