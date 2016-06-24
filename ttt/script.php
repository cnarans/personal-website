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
			else{}
		}

		$xCount = 0;
		$oCount = 0;
		for($i=0; $i<9; $i++){
			if($state[$i]=="1"){
				$xCount++;
			}
			elseif($state[$i]=="9"){
				$yCount++;
			}
			else{}
		}
		if($xCount>$oCount){
			return 9;
		}
		else{
			return 1;
		}
	}

	function printSquare($state, $square, $turn){

		if($state[$square]=="0"){
			echo '<a href="http://www.google.com"><font color=black>#</font></a>';
		}
		elseif($state[$square]=="1"){
			echo 'X';
		}
		else{
			echo 'O';
		}
	}
	$x="110999000";
?>