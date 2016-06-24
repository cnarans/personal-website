<!DOCTYPE html>
<html>
	<head>
		<?php include 'script.php';
			$pos = "000000000";
			if($_GET["state"]){
				$pos = $_GET["state"];
			}
			else{}
			$turn = checkStatus($pos);
		?>
		<title>Tic-Tac-Toe</title>
		<link type="text/css" rel="stylesheet" href="style.css"/>
	</head>

	<body>
		<div class = "wrapper">
			<h1>
				<?php
					if($turn==1){
						echo "X's Turn";
					}
					elseif($turn==9){
						echo "O's Turn";
					}
					elseif($turn==2){
						echo "X WINS!<br>";
						echo '<a href="index.php">Play Again?</a>';
					}
					elseif($turn==3){
						echo "O WINS!<br>";
						echo '<a href="index.php">Play Again?</a>';
					}
					elseif($turn==4){
						echo "A Draw<br>";
						echo '<a href="index.php">Play Again?</a>';
					}
					else{
						echo "ERROR: THE ONLY WAY TO WIN IS NOT TO PLAY";
					}
				?>
			</h1>
			<div class = "row">
				<div class = "cell">
					<?php printSquare($pos, 0, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($pos, 1, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($pos, 2, $turn) ?>
				</div>
			</div>
			<div class = "row">
				<div class = "cell">
					<?php printSquare($pos, 3, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($pos, 4, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($pos, 5, $turn) ?>
				</div>
			</div>
			<div class = "row">
				<div class = "cell">
					<?php printSquare($pos, 6, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($pos, 7, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($pos, 8, $turn) ?>
				</div>
			</div>
		</div>
	</body>

</html>