<?php

	# checkStatus determines the current status of the game
	#
	# $state = the current state of the game as determined by the query string
	# The first 9 digits of $state indicate the status of a game square
	# 0=blank; 1=X; 9=O
	# The last two digits indicates 1/2 for human/computer game and 1/2 for computer's pieces X/O
	#
	# returns an integer that corresponds to a game state
	# 1=X's turn; 9=O's turn; 2=X win; 3=O win; 4=draw
	function checkStatus($state){
		$win = array();
		$win[0] = $state[0] . $state[1] . $state[2];
		$win[1] = $state[3] . $state[4] . $state[5];
		$win[2] = $state[6] . $state[7] . $state[8];
		$win[3] = $state[0] . $state[3] . $state[6];
		$win[4] = $state[1] . $state[4] . $state[7];
		$win[5] = $state[2] . $state[5] . $state[8];
		$win[6] = $state[0] . $state[4] . $state[8];
		$win[7] = $state[2] . $state[4] . $state[6];

		foreach($win as $chance){
			if($chance=="111"){
				return 2;
			}
			elseif($chance=="999"){
				return 3;
			}
		}
		if(strpos($state, "0")===false){
			return 4;
		}
		else{
			return 5;
		}
	}

	# checkTurn returns a 1 if it is X's turn and 9 for O's turn
	#
	# $state = the current state of the game as determined by the query string
	#
	function checkTurn($state){
		$xCount = 0;
		$oCount = 0;
		for($i=0; $i<9; $i++){
			if($state[$i]=="1"){
				$xCount++;
			}
			elseif($state[$i]=="9"){
				$oCount++;
			}
		}
		if($xCount>$oCount){
			return 9;
		}
		else{
			return 1;
		}	
	}

	function turnStatus($state){
		$result = checkStatus($state);
		if($result!=5){
			return $result;
		}
		else{
			return checkTurn($state);
		}
	}

	#prints a square of the game board with the correct character and link
	#
	#$state = current state of the game as determined by the query string
	#$square = the square being printed
	#$turn = current players turn
	#
	function printSquare($state, $square, $turn){

		if($state[$square]=="0"){
			echo '<a style = "color:#4AA555" href="index.php?move=' . $square . $turn . '">#</a>';
		}
		elseif($state[$square]=="1"){
			echo 'X';
		}
		else{
			echo 'O';
		}
	}

	#prints a message indicating the current state of the game
	#
	#$state = current state of the game as determined by the query string
	#
	function printState($state){
		$coin = rand(0,1);
		if($coin==0){$coin=9;}
		if(empty($_SESSION)){
			$_SESSION["xwin"]=0;
			$_SESSION["owin"]=0;
			$_SESSION["hwin"]=0;
			$_SESSION["cwin"]=0;
			$_SESSION["hdraw"]=0;
			$_SESSION["cdraw"]=0;
		}
		
		$endgame = checkStatus($state);
		$turn = checkTurn($state);
		if($turn==1&&$endgame==5){
			echo "X's Turn";
		}
		elseif($turn==9&&$endgame==5){
			echo "O's Turn";
		}
		elseif($endgame==2){
			if($state[9]==2){
				if($state[10]==1){
					$_SESSION["cwin"]++;
					saveGame();
				}
				else{
					$_SESSION["hwin"]++;
					saveGame();
				}
			}
			else{
				$_SESSION["xwin"]++;
				saveGame();
			}
			echo "X WINS!<br>";
			echo '<a class="none"href="index.php?move=!' . $state[9] . '">Play Again?</a>';
		}
		elseif($endgame==3){
			if($state[9]==2){
				if($state[10]==9){
					$_SESSION["cwin"]++;
					saveGame();
				}
				else{
					$_SESSION["hwin"]++;
					saveGame();
				}
			}
			else{
				$_SESSION["owin"]++;
				saveGame();
			}
			echo "O WINS!<br>";
			echo '<a href="index.php?move=!' . $state[9] . '">Play Again?</a>';
		}
		elseif($endgame==4){
			if($state[9]==2){
				$_SESSION["cdraw"]++;
				saveGame();
			}
			else{
				$_SESSION["hdraw"]++;
				saveGame();
			}
			echo "A Draw<br>";
			echo '<a href="index.php?move=!' . $state[9] . '">Play Again?</a>';
		}
		else{
			echo "ERROR: THE ONLY WAY TO WIN IS NOT TO PLAY";
		}
	}

	# playerSwitch print a link that allows the user to switch between human
	# and computer opponents
	# 
	# $player indicates the current opponenet is 1 = Human; 2 = Computer
	#
	function playerSwitch($player){
		$coin = rand(0,1);
		if($coin==0){$coin=9;}
		if($player==2){
			echo '<a href="index.php">Play against a human instead</a><br>';
		}
		else{
			echo '<a href="index.php?move=!2">Play against the computer instead</a><br>';
		}
	}

	function aiMove($state){
		# $xo indicates if the computer is X or O
		$xo = $state[10];

		# This block set $other to the X or O of the opponent
		# $win and $lose stores  the values returned by checkStatus to see if the player has won or lost
		if($xo==1){
			$win = 2;
			$lose = 3;
			$other = 9;
		}
		else{
			$win = 3;
			$lose = 2;
			$other = 1;
		}

		# This block checks for each empty square and loads it into an array of valid moves
		$moves = [];
		for($i=0;$i<9;$i++){
			if($state[$i]==0){
				array_push($moves, $i);
			}
		}

		# First it checks to see if the center square is available
		if(in_array(4, $moves)){
			$state[4]=$xo;
			writeState("4" . $xo);
			return 1;
		}

		# Then it checks to see if any square will cause a victory or loss
		# If not, it selects a corner square
		else{
			foreach($moves as $move){
				$try = $state;
				$try[$move]=$xo;
				if(checkStatus($try)==$win){
					writeState($move . $xo);
					return 1;
				}
				$try[$move]=$other;
				if(checkStatus($try)==$lose){
					writeState($move . $xo);
					return 1;
				}
			}
			foreach($moves as $move){
				if($state[$move]==0&&($move==0||$move==2||$move==6||$move==8)){
					writeState($move . $xo);
					return 1;
				}
			}
		}

		# Finally, if all other options are taken, it selects a random square
		writeState($moves[rand(0,count($moves)-1)] . $xo);
	}

	# printRecords prints the game history against the current opponent
	#
	# $player indicates the current opponenet is 1 = Human; 2 = Computer
	#
	function printRecords($player){
		if($player==1){
			echo '<div class="results">
					<div class = "results__ident">X</div>
					<div class = "results__number">' . $_SESSION["xwin"] . '</div>
				</div>
				<div class="results">
					<div class = "results__ident">O</div>
					<div class = "results__number">' . $_SESSION["owin"] . '</div>
				</div>
				<div class="results">
					<div class = "results__ident">Draw</div>
					<div class = "results__number">' . $_SESSION["hdraw"] . '</div>
				</div>';
		}
		else{
			echo '<div class="results">
					<div class = "results__ident">Human</div>
					<div class = "results__number">' . $_SESSION["hwin"] . '</div>
				</div>
				<div class="results">
					<div class = "results__ident">Computer</div>
					<div class = "results__number">' . $_SESSION["cwin"] . '</div>
				</div>
				<div class="results">
					<div class = "results__ident">Draw</div>
					<div class = "results__number">' . $_SESSION["cdraw"] . '</div>
				</div>';
		}
	}

	$storage = "game.txt";

	function writeState($move){
		global $storage;
		$state = getState();
		if($move[0]=="!"){
			$state = "000000000" . $move[1] . "1";
		}
		else{
			$state[$move[0]]=$move[1];
		}
		$file_connection = fopen($storage, 'w') or die("Error opening file!");
		fwrite($file_connection, $state);
		fclose($file_connection);
	}

	function getState(){
		global $storage;
		$file_connection = fopen($storage, 'r') or die ("Error opening file!");
		$state = fgets($file_connection);
		fclose($file_connection);
		return $state;
	}

	function saveGame(){
		$state = getState();
		$storage = "history.txt";
		$file_connection = fopen($storage, 'a') or die("Error opening file!");
		fwrite($file_connection, $state . "\n");
		fclose($file_connection);
	}

	function printHistory(){
		$games = file("history.txt");
		for($i=0; $i<count($games); $i++){
			echo '<a href="index.php?game=' . $i . '">Game ' . ($i+1) . '</a><br>';
		}
	}
?>