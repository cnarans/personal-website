<?php
	include 'script.php';
	
	#
	# tests the functionality of the checkStatus() function in script.php
	#

	echo "\nTesting Tic-Tac-Toe functions checkStatus() and checkTurn()\n";

	$x = "991119911";
	$y = 4;
	if(checkStatus($x)==$y){
		echo "\nDraw Success\n";
	}
	else{
		echo "\nDraw Failure\n";
	}

	$x = "111910909";
	$y = 2;
	if(checkStatus($x)==$y){
		echo "\nX Win Success\n";
	}
	else{
		echo "\nX Win Failure\n";
	}

	$x = "911990911";
	$y = 3;
	if(checkStatus($x)==$y){
		echo "\nO Win Success\n";
	}
	else{
		echo "\nO Win Failure\n";
	}

	echo "\nPlaying through a typical game\n";

	$x = "000000000";
	$y = 1;
	if(turnStatus($x)==$y){
		echo "\nBegin with X Success\n";
	}
	else{
		echo "\nBegin with X Failure\n";
	}

	$x = "000010000";
	$y = 9;
	if(turnStatus($x)==$y){
		echo "\nO Turn Success\n";
	}
	else{
		echo "\nO Turn Failure\n";
	}

	$x = "900010000";
	$y = 1;
	if(turnStatus($x)==$y){
		echo "\nX Turn Success\n";
	}
	else{
		echo "\nX Turn Failure\n";
	}

	$x = "901010000";
	$y = 9;
	if(turnStatus($x)==$y){
		echo "\nO Turn Success\n";
	}
	else{
		echo "\nO Turn Failure\n";
	}

	$x = "901010900";
	$y = 1;
	if(turnStatus($x)==$y){
		echo "\nX Turn Success\n";
	}
	else{
		echo "\nX Turn Failure\n";
	}

	$x = "901110900";
	$y = 9;
	if(turnStatus($x)==$y){
		echo "\nO Turn Success\n";
	}
	else{
		echo "\nO Turn Failure\n";
	}

	$x = "901119900";
	$y = 1;
	if(turnStatus($x)==$y){
		echo "\nX Turn Success\n";
	}
	else{
		echo "\nX Turn Failure\n";
	}

	$x = "911119900";
	$y = 9;
	if(turnStatus($x)==$y){
		echo "\nO Turn Success\n";
	}
	else{
		echo "\nO Turn Failure\n";
	}

	$x = "911119990";
	$y = 1;
	if(turnStatus($x)==$y){
		echo "\nX Turn Success\n";
	}
	else{
		echo "\nX Turn Failure\n";
	}

	$x = "911119991";
	$y = 4;
	if(turnStatus($x)==$y){
		echo "\nDraw Success\n";
	}
	else{
		echo "\nDraw Failure\n";
	}
?>