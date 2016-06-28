<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<?php include 'functions.php'; 
			$id = basename($_SERVER['PHP_SELF']);
			if ($_GET["style"]=="alt"){ ?>
				<link type="text/css" rel="stylesheet" href="alt.css"/>
			<?php } else{ ?>
				<link type="text/css" rel="stylesheet" href="style.css"/>
			<?php }
		?>
		<title>Rupert's Page</title>
	</head>
	<body class = "main">
		<div class= "wrapper">
			<div class="left">
				<div class = "corner">
					<p class = "name"><a href=
					<?php
						if($_GET["style"]=="alt"){
							echo '"' . $id . '"';
						}
						else{
							echo '"' . $id . "?style=alt" . '"';
						}
					?>
					>Colin Narans</a></p>
					<p class = "social"><?php printSocial(); ?></p>
				</div>
				<div class = "links">
					<?php printNav($allPages, $articles, $id); ?>
				</div>
			</div>
			<div class = "main">
				<h1>Rupert's Page</h1>
				<img src="dog.jpg" alt="dog pic">
				<img src="dog2.jpg" alt="dog pic">
				<img src="dog3.jpg" alt="dog pic">
				<img src="dog4.jpg" alt="dog pic">
				<img src="dog5.jpg" alt="dog pic">
			</div>
		</div>
	</body>
</html>