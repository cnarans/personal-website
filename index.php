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
		<title>Colin's Page</title>
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
				<h1>Welcome to Colin's peronsal website!</h1>

				<p>Some random filler text.</p>
			</div>
		</div>
	</body>

	
</html>
