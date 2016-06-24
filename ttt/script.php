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
		if($xCount>$oCount){
			return 9;
		}
		elseif(strpos($state, "0")===false){
			return 4;
		}
		else{
			return 1;
		}
	}

	function printSquare($state, $square, $turn){

		if($state[$square]=="0"){
			$state[$square] = $turn;
			echo '<a href="index.php?state=' . $state . '"><font color=black>#</font></a>';
		}
		elseif($state[$square]=="1"){
			echo 'X';
		}
		else{
			echo 'O';
		}
	}
?>