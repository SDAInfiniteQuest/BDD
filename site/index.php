<?php
	session_start();
?>


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
			
		<?php include("header.php"); ?>

			
		<div id="main_wrapper">
		<p><br/><br/><br/><br/><br/><br/><br/><br/></p>
			<div id="5_top_item">
					<!--<?php include("5_top_item.php"); ?> -->
			</div>

			<div id="popular_list_and_comment">
				<div id="popular_list">
					<!--<?php include("popular_list.php"); ?> -->
				</div>

				<div id="last_comment">
					<!--<?php include("last_comment.php"); ?> -->
				</div>

			</div>
		</div>
			<?php include("footer.php"); ?> 
		</div>
	</body>

</html>
	
