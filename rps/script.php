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
	function game($hweapon, $aiweapon){
			if($hweapon==$aiweapon){
				return "You both selected " . $hweapon;
			}
			elseif($hweapon=="rock"){
				if($aiweapon=="scissors"){
					return "YOU WIN! " . $hweapon . " defeats " . $aiweapon;
				}
				else{
					return "LOSER! " . $hweapon . " loses to " . $aiweapon;
				}
			}
			elseif($hweapon=="paper"){
				if($aiweapon=="rock"){
					return "YOU WIN! " . $hweapon . " defeats " . $aiweapon;
				}
				else{
					return "LOSER! " . $hweapon . " loses to " . $aiweapon;
				}
			}
			elseif($hweapon=="scissors"){
				if($aiweapon=="paper"){
					return "YOU WIN! " . $hweapon . " defeats " . $aiweapon;
				}
				else{
					return "LOSER! " . $hweapon . " loses to " . $aiweapon;
				}
			}
			else{
				return "You screwed something up.";
			} 
	}
?>