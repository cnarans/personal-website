

<!DOCTYPE html>
<html>
	<head>
		<title>Rupert's Page</title>
		<h1>Rupert's Page</h1>
		<p>Pages:
			<?php 
				include 'functions.php'; 
				printNav($allPages, "dog.php");
			?>
		</p>
		<p>Articles:
			<?php 
				printNav($articles, 1);
			?>
		</p>
	</head>
	<body>
		<img src="dog.jpg" alt=This guy>
		
	</body>
</html>