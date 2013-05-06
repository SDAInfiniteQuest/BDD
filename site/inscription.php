
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="styleInscription.css">
		<title>BiblioMedia </title>

		<!-- Script de compatibilite html5 pour IE < 9 --!>
		
		<!--[if lt IE 9]>
			<script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
		<![endif]-->

	</head>

	<body>
			
		<?php include("header.php"); ?> 
			
		<div id="main_wrapper">
			<div id="bienvenue">
				
				<h1>Bienvenue</h1>
				
				<p>dfsdjfhsdjfhjdjsf
					<br/>asdasdasdasdasdasd
					<br/>sfsdfssfdfsdfdsdf
				</p>

				<p>sdfsdfssfsdfsdf
					<br/>sadsdasdasdasd
					<br/>asdadasdsdasd
				</p>
			
			</div>

			<div id="formulaire">	
				<form method="post" action="inscription_request.php">
					
					<p>
						<label for="nom">Nom</label> <br/> <input type="text"name="nom" id="nom">
					</p>

					<p>
						<label for="pseudo">Pseudo</label> <br/>  <input type="text"name="pseudo" id="pseudo">
					</p>
					
					<p>
						<label for="prenom">Prenom</label> <br/>  <input type="text"name="prenom" id="prenom">
					</p>

					<p>
						<label for="date_naissance">Date de naissance de la forme YYYY/MM/DD </label> <br/>  <input type="text"name="date_naissance" id="date_naissance">
					</p>
					

					<p>
						<label for="adresse">Adresse</label> <br/><input type="text"name="adresse" id="adresse">
					</p>
					
					<p>
						<label for="mail">Mail</label><br/> <input type="text"name="mail" id="mail">
					</p>
					
					<p>
						<label for="passw1">Password</label> <br/><input type="text"name="passw1" id="passw1">
					</p>
					
					<p>
						<label for="passw2">Confirmer le password</label> <br/><input type="text"name="passw2" id="passw2">
					</p>

					<p>
					<input type="submit" value="Envoyer" />
					</p>

				</form>
			</div>
		</div>
		
		<?php include("footer.php"); ?> 

	</body>
</html>
