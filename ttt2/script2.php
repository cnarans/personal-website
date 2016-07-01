<?php
	$storage = "history.txt";

	function getGame($line){
		global $storage;
		$games = file($storage);
		return $games[$line];
	}
	echo file($storage)[2];
?>