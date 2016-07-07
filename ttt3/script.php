<?php

function printSquare($state, $square, $turn){
	if($state[$square]=="0"){
			$state[$square] = $turn;
			echo '<a style = "color:#4AA555" href="index.php?state=' . $state . '">#</a>';
		}
		elseif($state[$square]=="1"){
			echo 'X';
		}
		else{
			echo 'O';
		}
}


?>