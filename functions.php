<?php 

class page{

	public $address;
	public $name;

	function __construct($address, $name){
		$this->address = $address;
		$this->name = $name;
	}

	function printLink($location){
		if($location!=$this->address){
			echo '<a href="' . $this->address . '">' . $this->name . '</a>';
		}
		else{
			echo '<span class="links--selected">' . $this->name . '</span>';
			//echo "COOKIES";
		}
	}

}

$allPages = array();
array_push($allPages, $home = new page("index.php", "Home"));
array_push($allPages, $goals = new page("goals.php", "Goals"));
array_push($allPages, $dog = new page("dog.php", "My Furball"));

$articles = array();
array_push($articles, $article1 = new page("ai.php", "The Future of AI"));
array_push($articles, $article2 = new page("web.php", "The Web as a Medium"));
array_push($articles, $article3 = new page("tttarticle.php", "Programming Tic-Tac-Toe"));

$projects = array();
array_push($projects, $rps = new page("/rps", "Rock-Paper-Scissors"));
array_push($projects, $ttt = new page("/ttt", "Tic-Tac-Toe"));

function printNav($pages, $art, $projects, $current){
	echo '<p class = "category">Pages</p>';
	foreach($pages as $page){		
		$page->printLink($current);
		echo "<br>";
	}
	echo '<p class = "category">Articles</p>';
	foreach($art as $a){
		$a->printLink($current);
		echo "<br>";
	}
	echo '<p class = "category">Projects</p>';
	foreach($projects as $a){
		$a->printLink($current);
		echo "<br>";
	}
}

function printSocial(){
	echo '<a href="https://www.facebook.com/colin.narans"><img src="fb.png" alt="fb icon" style="width:30px;height:30px;"></a>
	<a href="https://twitter.com/Colin_T_N"><img src="twitter.png" alt="twitter icon" style="width:30px;height:30px;"></a>
	<a href="https://www.linkedin.com/in/colin-narans-377318a9"><img src="ln.png" alt="ln icon" style="width:30px;height:30px;"></a>
	<a href="https://github.com/cnarans"><img src="github.png" alt="git icon" style="width:30px;height:30px;"></a>';
}

?>