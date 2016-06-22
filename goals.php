

<!DOCTYPE html>
<html>
	<head>
		<title>Colin's Goals</title>
		<h1>Colin's Goals</h1>
		<p>Pages:
			<?php 
				include 'functions.php'; 
				printNav($allPages, "goals.php");
			?>
		</p>
		<p>Articles:
			<?php 
				printNav($articles, 1);
			?>
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