<?php 
session_start();
include 'script.php';
$pos = "00000000011";
$turn = "1";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Tic-Tac-Toe</title>
		<link type="text/css" rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div class = "wrapper">
			<div class="top">
				<div class = "arrow"><a href="../"><img src="White_left_arrow.svg" alt="back arrow"></a></div>
				<div class = "status">
					Status
				</div>
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
			<h2>Switch Players</h2>
			<div class = "bottom">
				<h2><a href="index.php?reset=true">(Reset Records)</a></h2>
				Records Here
			</div>
		</div>
	</body>
</html>