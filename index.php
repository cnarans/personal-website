<!DOCTYPE html>
<html>
	<head>
		<title>Colin's Page</title>
		<h1>Welcome to Colin's Personal Website</h1>
		<p>Pages:
			<?php 
				include 'functions.php'; 
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
