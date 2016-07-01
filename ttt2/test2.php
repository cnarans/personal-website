<?php
	include 'script.php';

	#
	# test the functionality of the aiTest function in script.php
	#

	echo "\nBegin Testing:\n";

	$testState = "00000000021";

	$result = aiMove($testState);
	echo "\nTest state is " . $testState;
	echo "\nResult is " . $result;
	if($result[4]==1){
		echo "\nX takes center: Success\n";
	}
	else{
		echo "\nX takes center: Failure\n";
	}

	$testState = "00001000029";
	$result = aiMove($testState);
	echo "\nTest state is " . $testState;
	echo "\nResult is " . $result;
	if($result[0]==9||$result[2]==9||$result[6]==9||$result[8]==9){
		echo "\nO takes corner: Success\n";
	}
	else{
		echo "\nO take corner: Failure";
	}

	$testState = "10901000029";
	$result = aiMove($testState);
	echo "\nTest state is " . $testState;
	echo "\nResult is " . $result;
	if($result[8]==9){
		echo "\nO blocks X: Success\n";
	}
	else{
		echo "\nO blocks X: Failure\n";
	}

	$testState = "10901000921";
	$result = aiMove($testState);
	echo "\nTest state is " . $testState;
	echo "\nResult is " . $result;
	if($result[5]==1){
		echo "\nX blocks O: Success\n";
	}
	else{
		echo "\nX blocks O: Failure\n";
	}

?>