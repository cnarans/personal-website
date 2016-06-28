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
			if($_GET["state"]){
				$pos = $_GET["state"];
			}
			else{
				$pos = "00000000011";
			}
			$turn = checkStatus($pos);
			if($pos[9]==2&&$pos[10]==$turn){
				$pos = aiMove($pos);
				$turn = checkStatus($pos);
			}
		?>
		<div class = "wrapper">
			<h1>
				<?php
					printState($pos);
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
			<div class = "results">
				<h2>Records <a href="index.php?reset=true">(Reset Results)</a></h2>
				<p>In two-player games:</p>
				<p>X has won <?php echo $_SESSION["xwin"]; ?> times</p>
				<p>O has won <?php echo $_SESSION["owin"]; ?> times</p>
				<p>There has been a draw <?php echo $_SESSION["hdraw"]; ?> times</p>
				<p>Versus the computer:</p>
				<p>The human has won <?php echo $_SESSION["hwin"]; ?> times</p>
				<p>The computer has won <?php echo $_SESSION["cwin"]; ?> times</p>
				<p>There has been a draw <?php echo $_SESSION["cdraw"]; ?> times</p>
			</div>
		</div>
	</body>

</html>