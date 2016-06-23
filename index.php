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
		<title>Colin's Page</title>
		<h1>Welcome to Colin's Personal Website</h1>
		<p>
			<?php printNav($allPages, $articles, $id); ?>
		</p>
	</head>

	
</html>
