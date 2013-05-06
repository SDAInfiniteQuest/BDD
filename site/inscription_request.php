<?php

 
//	if ($_POST['passw1']!=$_POST['passw2']) {
//		echo "<p>erreur mot de passe different</p>";
//	}

	//else {
		$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
		//$mode =	OCI_COMMIT_ON_SUCCESS;
	
		$stmt=oci_parse($conn,'SELECT max(idUtilisateur) FROM UTILISATEUR');
		oci_execute($stmt);

		$id_max=oci_fetch_row($stmt);
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
		oci_close($conn);
	//}

?>

