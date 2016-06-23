<!DOCTYPE html>
<html>
	<head>
		<?php include 'functions.php'; ?>
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<title>Colin's Page</title>
		<h1>Welcome to Colin's Personal Website</h1>
		<p>Pages:
			<?php 
				printNav($allPages, "index.php");
			?>
		</p>
		<p>Articles:
			<?php 
				printNav($articles, 1);
			?>
		</p>
	</head>

	
</html>
