<?php

# Prints a square of the game board with the correct character and link
#
# $state = the current state of the game as determined by the query string
# The first 9 digits of $state indicate the status of a game square
# 0=blank; 1=X; 9=O
# The last two digits indicates 1/2 for human/computer game and 1/2 for computer's pieces X/O
#
function printSquare($state, $square, $turn){
	if($state[$square]=="0"){
		$state[$square] = $turn;
		echo '<a style = "color:transparent" href="index.php?state=' . $state . '">#</a>';
	}
	elseif($state[$square]=="1"){
		echo 'X';
	}
	elseif($state[$square]=="9"){
		echo 'O';
	}
}

# Checks to see if the game has ended
# Return 2->xwin; 3->owin; 4->draw; 5->not endgame
#
# $state = the current state of the game as determined by the query string
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

# Returns the current player's turn 1->X 2->O
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

# Return the result of checkStatus if game has ended.
# Otherwise is returns checkTurn;
#
# $state = the current state of the game as determined by the query string
#
function turnStatus($state){
	$result = checkStatus($state);
	if($result!=5){
		return $result;
	}
	else{
		return checkTurn($state);
	}
}

# Returns a state indicating the computer player's move
#
# $state = the current state of the game as determined by the query string
#
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
		return $state;
	}

	# Then it checks to see if any square will cause a victory or loss
	# If not, it selects a corner square
	else{
		foreach($moves as $move){
			$try = $state;
			$try[$move]=$xo;
			if(checkStatus($try)==$win){
				return $try;
			}
			$try[$move]=$other;
			if(checkStatus($try)==$lose){
				$try[$move]=$xo;
				return $try;
			}
		}
		foreach($moves as $move){
			if($state[$move]==0&&($move==0||$move==2||$move==6||$move==8)){
				$state[$move]=$xo;
				return $state;
			}
		}
	}

	# Finally, if all other options are taken, it selects a random square
	$state[$moves[rand(0,count($moves)-1)]] = $xo;
	return $state;
}

# Records the result of a game and returns all game results
#
# $scores = An array of past game outcomes
# $state = The current state of the game as determined by the query string
#
function storeScore($scores, $state){

	$turn = turnStatus($state);
	$ai = $state[10];

	if(!isset($scores)){
		$scores["xwin"]=0;
		$scores["owin"]=0;
		$scores["hwin"]=0;
		$scores["cwin"]=0;
		$scores["hdraw"]=0;
		$scores["cdraw"]=0;
	}
	
	if($turn!=1&&$turn!=9){
		if($state[9]=="1"){
			if($turn==2){
				$scores["xwin"]++;
			}
			elseif($turn==3){
				$scores["owin"]++;
			}
			else{
				$scores["hdraw"]++;
			}
		}
		else{
			if($turn==2&&$ai=="9"){
				$scores["hwin"]++;
			}
			elseif($turn==2){
				$scores["cwin"]++;
			}
			elseif($turn==3&&$ai=="1"){
				$scores["hwin"]++;
			}
			elseif($turn==3){
				$scores["cwin"]++;
			}
			else{
				$scores["cdraw"]++;
			}
		}
	}
	return $scores;
}

?>