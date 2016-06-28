<?php
	#
	#Tests all nine possible combinations for Rock/Paper/Scissors in game() function
	#
	include 'script.php';

	echo "\nTesting Rock/Paper/Scissors\n";

	if(strpos(game("rock", "rock"), "both")){
		echo "\nRock/Rock Success\n";
	}
	else{
		echo "\nRock/Rock Failure\n";
	}

	if(strpos(game("rock", "paper"), "loses")){
		echo "\nRock/Paper Success\n";
	}
	else{
		echo "\nRock/Paper Failure\n";
	}

	if(strpos(game("rock", "scissors"), "WIN")){
		echo "\nRock/Scissors Success\n";
	}
	else{
		echo "\nRock/Scissors Failure\n";
	}

	if(strpos(game("paper", "paper"), "both")){
		echo "\nPaper/Paper Success\n";
	}
	else{
		echo "\nPaper/Paper Failure\n";
	}

	if(strpos(game("paper", "scissors"), "loses")){
		echo "\nPaper/Scissors Success\n";
	}
	else{
		echo "\nPaper/Scissors Failure\n";
	}

	if(strpos(game("paper", "rock"), "WIN")){
		echo "\nPaper/Rock Success\n";
	}
	else{
		echo "\nPaper/Rock Failure\n";
	}

	if(strpos(game("scissors", "scissors"), "both")){
		echo "\nScissors/Scissors Success\n";
	}
	else{
		echo "\nScissors/Scissors Failure\n";
	}

	if(strpos(game("scissors", "rock"), "loses")){
		echo "\nScissors/Rock Success\n";
	}
	else{
		echo "\nScissors/Rock Failure\n";
	}

	if(strpos(game("scissors", "paper"), "WIN")){
		echo "\nScissors/Paper Success\n";
	}
	else{
		echo "\nScissors/Paper Failure\n";
	}
?>