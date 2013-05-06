<?php

	if ($_POST['passw1']!=$_POST['passw2']) {
		echo "erreur mot de passe different";
	}
	else {
		$conn = oci_connect('pallamidessi','','localhost:1521/ROSA');
		$mode =	OCI_COMMIT_ON_SUCCESS;
	
		$stmt=oci_parse("SELECT max(idUtilisateur) FROM UTILISATEUR");
		oci_execute($stmt,$mode);

		$id_max=oci_fetch_row($stmt);

		$stmt=oci_parse($conn,"INSERT INTO UTILISATEUR
	VALUES('$id_max',to_date('$_POST[date_naissance]','YYYY/MM/DD'),'$_POST['pseudo']','$_POST['nom']','$_POST['prenom']','$_POST['adresse']','$_POST['mail']','$_POST['passw1']');");
	

	oci_execute($stmt,$mode);
	oci_close($conn);
	}

?>

