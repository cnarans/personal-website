<?php

	#checkStatus determines the current status of the game
	#
	#$state = the current state of the game as determined by the query string
	#
	#returns an integer that corresponds to a game state
	function checkStatus($state){
		$win = array("","","","","","","","");
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

		$xCount = 0;
		$oCount = 0;
		for($i=0; $i<9; $i++){
			if($state[$i]=="1"){
				$xCount++;
			}
			elseif($state[$i]=="9"){
				$oCount++;
			}
			else{}
		}
		if(strpos($state, "0")===false){
			return 4;
		}
		elseif($xCount>$oCount){
			return 9;
		}
		else{
			return 1;
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
			$state[$square] = $turn;
			echo '<a style = "color:black" href="index.php?state=' . $state . '">#</a>';
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
		if(empty($_SESSION["xwin"])){
			$_SESSION["xwin"]=0;
			$_SESSION["owin"]=0;
			$_SESSION["hwin"]=0;
			$_SESSION["cwin"]=0;
			$_SESSION["2draw"]=0;
			$_SESSION["cdraw"]=0;
		}
		if($state[9]==2){
			echo '<a href="index.php">Play against a human instead</a><br>';
		}
		else{
			echo '<a href="index.php?state=0000000002' . $coin . '">Play against the computer instead</a><br>';
		}
		$turn = checkStatus($state);
		if($turn==1){
			echo "X's Turn";
		}
		elseif($turn==9){
			echo "O's Turn";
		}
		elseif($turn==2){
			if($state[9]==2){
				if($state[10]==1){
					$_SESSION["cwin"]++;
				}
				else{
					$_SESSION["hwin"]++;
				}
			}
			else{
				$_SESSION["xwin"]++;
			}
			echo "X WINS!<br>";
			echo '<a href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
		}
		elseif($turn==3){
			if($state[9]==2){
				if($state[10]==9){
					$_SESSION["cwin"]++;
				}
				else{
					$_SESSION["hwin"]++;
				}
			}
			else{
				$_SESSION["owin"]++;
			}
			echo "O WINS!<br>";
			echo '<a href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
		}
		elseif($turn==4){
			if($state[9]==2){
				$_SESSION["cdraw"]++;
			}
			else{
				$_SESSION["hdraw"]++;
			}
			echo "A Draw<br>";
			echo '<a href="index.php?state=000000000' . $state[9] . $coin . '">Play Again?</a>';
		}
		else{
			echo "ERROR: THE ONLY WAY TO WIN IS NOT TO PLAY";
		}
	}

	function aiMove($state){
		$xo = $state[10];
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
		$moves = [];
		for($i=0;$i<9;$i++){
			if($state[$i]==0){
				array_push($moves, $i);
			}

		}
		if(in_array(4, $moves)){
			$state[4]=$xo;
			return $state;
		}
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
		$state[$moves[rand(0,count($moves)-1)]] = $xo;
		return $state;
	}
#	echo aiMove("00001000009");
?>