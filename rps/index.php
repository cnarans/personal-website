<?php include 'script.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Rock, Paper, Scissors</title>
	</head>
	<body>
		<h1>Choose your weapon</h1>
		<a href="index.php?weapon=rock"><img src="rock.jpg" alt="rock pic" style="width:200px;height:200px;"></a>
		<a href="index.php?weapon=paper"><img src="paper.png" alt="paper pic" style="width:200px;height:200px;"></a>
		<a href="index.php?weapon=scissors"><img src="scissors.jpg" alt="scissors pic" style="width:200px;height:200px;"></a>
		<br>
		<?php 
			if($_GET["weapon"]){
				$aiweapon = aiWeapon();
				echo game($_GET["weapon"], $aiweapon);
			}
		?>
	</body>

</html>