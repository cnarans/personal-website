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
		<title>Colin's Goals</title>
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
				<h1>Colin's Goals</h1>
				<h2>Personal Goals</h2>
				<ul>
					<li>Get on regular schedule of exercise and sleep</li>
					<li>Improve my karaoke skills</li>
				</ul>

				<h2>Professional Goals</h2>
				<ul>
					<li>Improve my coding skills to the point where I can obtain a job in the field</li>
					<li>Develop an impressive portfolio of web development projects</li>
				</ul>
			</div>
		</div>
	</body>
</html>