<header>
	<div id="header_image">
		<h1>BiblioMedia</h1>
	</div>
	
	<div id="nav_and_search_header">
		<nav>
			<ul>
				<?php 
					if (isset($_SESSION['login'])) {
						echo"Bonjour".$_SESSION['login'];
					}
					else{
						echo'<li><a href="login.php">Sign-in</a></li>';
					}	
				?>
				<li><a href="inscription.php">Create Account</a></li>
				<li><a href="liste_objet.php">Item</a></li>
				<li><a href="liste_liste.php">List</a></li>
				<li><a href="listeUtilisateurs.php">People</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</nav>
		
		<div id="searchbox_header">
			<form method="post" action="#">
				<p>
					<label for="search_header">Search</label> <input type="text" name="search" id="search_header">
				</p>
				</form>
		</div>
	
	</div>
</header>

