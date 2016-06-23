

<!DOCTYPE html>
<html>
	<head>
		<?php include 'functions.php'; 
			$id = basename($_SERVER['PHP_SELF']);
			if ($_GET["style"]=="alt"){ ?>
				<link type="text/css" rel="stylesheet" href="alt.css"/>
			<?php } else{ ?>
				<link type="text/css" rel="stylesheet" href="style.css"/>
			<?php }
		?>
		<title>Rupert's Page</title>
		<h1>Rupert's Page</h1>
		<p>
			<?php printNav($allPages, $articles, $id); ?>
		</p>
	</head>
	<body>
		<img src="dog.jpg" alt=This guy>
		<img src="dog2.jpg">
		<img src="dog3.jpg">
		<img src="dog4.jpg">
		<img src="dog5.jpg">
	</body>
</html>