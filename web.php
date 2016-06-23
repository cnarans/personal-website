

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
		<title>The Web as a Medium</title>
		<h1>The Web as a Medium</h1>
		<p>
			<?php printNav($allPages, $articles, $id); ?>
		</p>
	</head>

	<body>
		<p>The web has become so ubiquitous in our daily lives that it’s hard to believe this August will only be the 25th anniversary of its public debut.  This ubiquity has become one of the web’s defining features, and the reason why it would be inconceivable for any major business or organization of any kind to lack a website.  But in addition to these big players, the web allows just about anyone to get in the game. </p>
	</body>
</html>