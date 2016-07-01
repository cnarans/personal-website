<?php
	$storage = "game.txt";

	function writeState($state){
		global $storage;
		$file_connection = fopen($storage, 'w') or die("Error opening file!");
		fwrite($file_connection, $state);
		fclose($file_connection);
	}

	function getState(){
		global $storage;
		$file_connection = fopen($storage, 'r') or die ("Error opening file!");
		$state = fgets($file_connection);
		fclose($file_connection);
		return $state;
	}
?>