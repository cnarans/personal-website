<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<?php include 'functions.php'; 
			$id = basename($_SERVER['PHP_SELF']);
			if ($_GET["style"]=="alt"){ ?>
				<link type="text/css" rel="stylesheet" href="alt.css"/>
			<?php } else{ ?>
				<link type="text/css" rel="stylesheet" href="style.css"/>
			<?php }
		?>
		<title>Programming Tic-Tac-Toe</title>
	</head>
	<body class = "body">
		<div class = "wrapper">
			<div class="left">
				<div class = "corner">
					<p class = "name"><a href=
					<?php
						if($_GET["style"]=="alt"){
							echo '"' . $id . '"';
						}
						else{
							echo '"' . $id . "?style=alt" . '"';
						}
					?>
					>Colin Narans</a></p>
					<p class = "social"><?php printSocial(); ?></p>
				</div>
				<div class = "links">
					<?php printNav($allPages, $articles, $id); ?>
				</div>
			</div>
			<div class = "main">
				<div class = "article">
					<h1>Programming Tic-Tac-Toe</h1>

					<p>	Creating a game of Tic-Tac-Toe on a webpage offers us our first real chance to put to use the PHP query strings that were used in our Rock-Paper-Scissors program.  The query string allows us to pass information to a webpage by including it in the address for that page.  While this method can’t be used for sensitive information, such as credit card numbers, it works perfectly for a simple game.</p>

					<p>	Information is passed from page to page via the query string “?state=*number*” where number is a ten digit number that encodes the state of the current Tic-Tac-Toe game.  This query string is place after the web address, and the information stored in it can then be accessed by the PHP code that is running on the server that hosts the website.  The PHP code then does the work of determining how the game should be displayed, which player’s turn it is, and if the game has ended.  As my query string, I used a nine digit number, with each digit corresponding to a place on the game board.</p>

					<p>	The game was set up so that each move on the game board contained a link that would communicate the move to the PHP code.  When the link is clicked, the page reloads, but the PHP code now knows to place an X or O in the position that was clicked and asks the next player for their move.  The code also checks to see if there are three X’s or O’s in a row, or if all positions have been taken and the game is a draw.  At that point, it announces the result of the game and provides a link to reset the game for another round.</p>

					<p>After getting the basic two-player version of Tic-Tac-Toe working, the next step was to implement a computer player.  I added 2 more digits to query string.  The first indicated whether or not the user had selected a computer player, and the second was a randomly generated number that assigned the computer player to X or O.  When it is the computer player’s turn, the query string is passed to another function in the PHP script file that looks at the current state of the game and selects the best position for the computer.  This function will take either the center square or a corner square as its starting position.  If it sees a possible winning square for either player it will take the square, and otherwise is will take a random square.  The query string is modified just as if a human player had entered it, and the string is passed back to the webpage.</p>

					<p>The last step in the program was to implement a counter that could record the number of wins for each player.  This was done using PHP session variables, which allow values to be stored over the course of the game without using query strings.  When the page is first loaded, a session is started, and each time a game ends a new value is assigned to a session variable indicating the winner of the game, or if it was a draw.  This information is then printed below the game board.  The user also has an option to reset the record.  This comes in the form of a link the passes a query string to the webpage and tell a piece of PHP code to reset the session variables, the same as if a new session had just been started.</p>
				</div>
			</div>
		</div>
	</body>
</html>