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