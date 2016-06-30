<?php
	
	#returns a randomly selected weapon for the computer
	#
	function aiWeapon(){
		$weapons = array("rock", "paper", "scissors");
		return $weapons[rand(0,2)];
	}

	#determines the winner of a game of rock-paper-scissors
	#
	#$hweapon = the human weapon choice
	#$aiweapon = the computer weapon choice
	#
	function game($weapon1, $weapon2){
			if($weapon1==$weapon2){
				return "You both selected " . $weapon1;
			}
			elseif($weapon1=="rock"){
				if($weapon2=="scissors"){
					return "YOU WIN! " . $weapon1 . " defeats " . $weapon2;
				}
				else{
					return "LOSER! " . $weapon1 . " loses to " . $weapon2;
				}
			}
			elseif($weapon1=="paper"){
				if($weapon2=="rock"){
					return "YOU WIN! " . $weapon1 . " defeats " . $weapon2;
				}
				else{
					return "LOSER! " . $weapon1 . " loses to " . $weapon2;
				}
			}
			elseif($weapon1=="scissors"){
				if($weapon2=="paper"){
					return "YOU WIN! " . $weapon1 . " defeats " . $weapon2;
				}
				else{
					return "LOSER! " . $weapon1 . " loses to " . $weapon2;
				}
			}
			else{
				return "You screwed something up.";
			} 
	}
?>