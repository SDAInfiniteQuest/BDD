<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="styleLogin.css">
		<title>BiblioMedia </title>

		<!-- Script de compatibilite html5 pour IE < 9 --!>
		
		<!--[if lt IE 9]>
			<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
		<![endif]-->

	</head>

	<body>
		<?php	include('header.php'); ?>  
		<div id="main_wrapper">
		
			<?php
			if(isset($_SESSION['Pseudo']))
			{
				echo 'vous etes déjà enregistré sur notre site';
			}
			else
			{
				echo
				'<form method="post" action="login_request.php" id="log"> 
					<p>	
						<label for="Login">Login</label> <input type="text"name="Login" id="Login">	
					</p> 
					<p> 
						<label for="Password">Password</label> <input	type="password" name="Password" id="Password">	
					</p>

					<p>
						<input type="submit" value="Envoyer" >
					</p>
				</form>
				';
			}
			?>

		</div>
		<?php	include('footer.php'); ?> 
	</body>
</html>
