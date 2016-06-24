<?php 

class page{

	public $address;
	public $name;

	function __construct($address, $name){
		$this->address = $address;
		$this->name = $name;
	}

	function printLink(){
		echo "<a href=\"$this->address\">$this->name</a>";
	}

}

$allPages = array();
array_push($allPages, $home = new page("index.php", "Home"));
array_push($allPages, $goals = new page("goals.php", "Goals"));
array_push($allPages, $dog = new page("dog.php", "My Furball"));

$articles = array();
array_push($articles, $article1 = new page("ai.php", "The Future of AI"));
array_push($articles, $article2 = new page("web.php", "The Web as a Medium"));

function printNav($pages, $art, $current){
	echo '<p>Pages</p><br>';
	foreach($pages as $page){
		if($page->address==$current){
			echo $page->name . "<br><br>";
		}
		else{
			$page->printLink();
			echo "<br>";
		}
	}
	echo '<p>Articles</p><br>';
	foreach($art as $a){
		if($a->address==$current){
			echo $a->name . "<br><br>";
		}
		else{
			$a->printLink();
			echo "<br>";
		}
	}
}

function printSocial(){
	echo '<a href="https://www.facebook.com/colin.narans"><img src="fb.png" style="width:30px;height:30px;"></a>
	<a href="https://www.facebook.com/colin.narans"><img src="twitter.png" style="width:30px;height:30px;"></a>
	<a href="https://www.facebook.com/colin.narans"><img src="ln.png" style="width:30px;height:30px;"></a>
	<a href="https://github.com/cnarans"><img src="git.png" style="width:30px;height:30px;"></a>';
}

?>