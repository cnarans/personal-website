<?php 
session_start();
include 'script.php';
if($_GET["reset"]){
	unset($_SESSION["score"]);
}
else{
	$_SESSION["score"] = storeScore($_SESSION["score"], $turn);
}

if(isset($_GET["state"])){
	$state = $_GET["state"];
}
else{
	$state = "00000000011";
}

$turn = turnStatus($state);

if($state[9]==2&&$state[10]==$turn){
	$state = aiMove($state);
	$turn = turnStatus($state);
}

$coin = rand(0,1);
if($coin==0){$coin=9;}
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
			<div class = "top">
				<div class = "arrow"><a href="../"><img src="White_left_arrow.svg" alt="back arrow"></a></div>
				<div class = "status">
					<?php
						if($turn=="1"){
							echo "X's Turn<br>";
						}
						elseif($turn=="9"){
							echo "O's Turn";
						}
						elseif($turn=="2"){
							echo "X Wins!<br>";
							echo '<a class="none"href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
						}
						elseif($turn=="3"){
							echo "O Wins!<br>";
							echo '<a class="none"href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
						}
						elseif($turn=="4"){
							echo "It's a Draw<br>";
							echo '<a class="none"href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
						}
						else{
							echo "ERROR<br>";
							echo '<a class="none"href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
						}
					?>
				</div>
			</div>
			<div class = "row">
				<div class = "cell">
					<?php printSquare($state, 0, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($state, 1, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($state, 2, $turn) ?>
				</div>
			</div>
			<div class = "row">
				<div class = "cell">
					<?php printSquare($state, 3, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($state, 4, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($state, 5, $turn) ?>
				</div>
			</div>
			<div class = "row">
				<div class = "cell">
					<?php printSquare($state, 6, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($state, 7, $turn) ?>
				</div>
				<div class = "cell">
					<?php printSquare($state, 8, $turn) ?>
				</div>
			</div>
			<h2><?php
				if($state[9]==2){
					echo '<a href="index.php">Play against a human instead</a><br>';
				}
				else{
					echo '<a href="index.php?state=0000000002' . $coin . '">Play against the computer instead</a><br>';
				}
			?></h2>
			<div class = "bottom">
				<h2><a href="index.php?reset=true">(Reset Records)</a></h2>
				<?php if($state[9]==1){?>
				<div class="results">
					<div class = "results__ident">X</div>
					<div class = "results__number"><?php echo $_SESSION["xwin"]; ?></div>
				</div>
				<div class="results">
					<div class = "results__ident">O</div>
					<div class = "results__number"><?php echo $_SESSION["owin"]; ?></div>
				</div>
				<div class="results">
					<div class = "results__ident">Draw</div>
					<div class = "results__number"><?php echo $_SESSION["hdraw"]; ?></div>
				</div><?php }
				else{ ?>
				<div class="results">
					<div class = "results__ident">Human</div>
					<div class = "results__number"><?php echo $_SESSION["hwin"]; ?></div>
				</div>
				<div class="results">
					<div class = "results__ident">Computer</div>
					<div class = "results__number"><?php echo $_SESSION["cwin"]; ?></div>
				</div>
				<div class="results">
					<div class = "results__ident">Draw</div>
					<div class = "results__number"><?php echo $_SESSION["cdraw"]; ?></div>
				</div><?php } ?>
			</div>
		</div>
	</body>
</html>