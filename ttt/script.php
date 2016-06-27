<?php

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

	function printState($turn){
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
	}
?>