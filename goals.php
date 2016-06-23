

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
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<title>Colin's Goals</title>
		<h1>Colin's Goals</h1>
		<p>
			<?php printNav($allPages, $articles, $id); ?>
		</p>
	<body>

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

	</body>
</html>