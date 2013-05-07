<header>
	<div id="header_image">
		<h1>BiblioMedia</h1>
	</div>
	
	<div id="nav_and_search_header">
		<nav>
			<ul>
				<php?
				if(isset($_SESSION['Pseudo'])
				{
					echo "<li><a href="login.html">$_SESSION['Pseudo']</a></li>";
				}
				else
				{
					echo "<li><a href="login.html">Sign-in</a></li>";
				}
				?>
				<li><a href="inscription.php">Create Account</a></li>
				<li><a href="#">Item</a></li>
				<li><a href="liste_liste.php">List</a></li>
				<li><a href="#">People</a></li>
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

