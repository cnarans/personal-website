<?php 
session_start();
include 'script.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Tic-Tac-Toe</title>
		<link type="text/css" rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<?php 
			if($_GET["reset"]){
				$_SESSION=null;
			}
			if($_GET["move"]){
				writeState($_GET["move"]);
			}
			else{
				writeState("!1");
			}
			$pos = getState();
			$turn = checkTurn($pos);
			if($pos[9]==2&&$pos[10]==$turn){
				aiMove($pos);
				$pos = getState();
				$turn = checkTurn($pos);
			}
			echo $pos;
		?>
		<div class = "wrapper">
			<div class="top">
				<div class = "arrow"><a href="../"><img src="White_left_arrow.svg" alt="back arrow"></a></div>
				<div class = "status"><?php
					printState($pos);
				?></div>
			</div>
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
			<h2><?php playerSwitch($pos[9]); ?></h2>
			<div class = "bottom">
				<h2><a href="index.php?reset=true">(Reset Records)</a></h2>
				<?php printRecords($pos[9]); ?>
			</div>
		</div>
	</body>

</html>