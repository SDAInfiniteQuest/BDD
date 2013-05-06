<?php
	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse($conn,'SELECT hash FROM UTILISATEUR pseudo=:pseudo');
	oci_bind_by_name($stmt,":pseudo",$_POST['Pseudo']);
	oci_execute($stmt);

	if($stmt!=NULL)
	{
		echo "aucun utilisateur ne possède ce pseudo dans la base";
	}
	else if($stmt==$_POST['Password'])
	{
		echo "vous etes maintenant connecté au site";		
		$_SESSION['login']=$_POST['Pseudo'];
		$_SESSION['pwd']=$_POST['Password'];
	}
	else
	{
		echo "mot de passe incorrect";$
	}
?>


