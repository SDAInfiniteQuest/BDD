<?php
	$conn = oci_connect('pallamidessi','bonefactory00','localhost:1521/ROSA');
	$mode =	OCI_COMMIT_ON_SUCCESS;
	
	$stmt=oci_parse($conn,'SELECT HASH FROM UTILISATEUR WHERE pseudo=:pseudo');
	oci_bind_by_name($stmt,":pseudo",$_POST['Login']);
	oci_execute($stmt);

	if($stmt==NULL)
	{
		echo "aucun utilisateur ne possède ce pseudo dans la base";
	}
	else 
	{
		$obj=oci_fetch_array($stmt);

		if($obj['HASH']==$_POST['Password']){
			echo "vous etes maintenant connecté au site";		
			$_SESSION['login']=$_POST['Login'];
			
			header('Location: index.php');
		}
		else
		{
			echo $_POST['Password']."et".$obj['HASH'];
			echo "mot de passe incorrect";
		}
	}
	oci_free_statement($stmt);
	oci_close($conn);
?>


