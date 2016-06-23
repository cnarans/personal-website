<!DOCTYPE html>
<html>
	<head>
		<title>Rock, Paper, Scissors</title>
	</head>
	<body>
		<h1>Choose your weapon</h1>
		<a href="rps.php?weapon=rock"><img src="rock.jpg" style="width:200px;height:200px;"></a>
		<a href="rps.php?weapon=paper"><img src="paper.png" style="width:200px;height:200px;"></a>
		<a href="rps.php?weapon=scissors"><img src="scissors.jpg" style="width:200px;height:200px;"></a>
		<br>
		<?php 
		if($_GET["weapon"]){
			$weapons = array("rock", "paper", "scissors");
			$weapon = $_GET["weapon"];
			$aiweapon = $weapons[rand(0,2)];

			if($weapon==$aiweapon){
				echo "You both selected " . $weapon;
			}
			elseif($weapon=="rock"){
				if($aiweapon=="scissors"){
					echo "YOU WIN! " . $weapon . " defeats " . $aiweapon;
				}
				else{
					echo "LOSER! " . $weapon . " loses to " . $aiweapon;
				}
			}
			elseif($weapon=="paper"){
				if($aiweapon=="rock"){
					echo "YOU WIN! " . $weapon . " defeats " . $aiweapon;
				}
				else{
					echo "LOSER! " . $weapon . " loses to " . $aiweapon;
				}
			}
			elseif($weapon=="scissors"){
				if($aiweapon=="paper"){
					echo "YOU WIN! " . $weapon . " defeats " . $aiweapon;
				}
				else{
					echo "LOSER! " . $weapon . " loses to " . $aiweapon;
				}
			}
			else{
				echo "You screwed something up.";
			}
		} 
		?>
	</body>

</html>