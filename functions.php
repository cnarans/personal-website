<?php 

class page{

	public $type;
	public $address;
	public $name;

	function __construct($type, $address, $name){
		$this->type = $type;
		$this->address = $address;
		$this->name = $name;
	}

	function printLink(){
		echo "<a href=\"$this->address\">$this->name</a>";
	}

}

$allPages = array();
array_push($allPages, $home = new page("Page", "index.php", "Home"));
array_push($allPages, $goals = new page("Page", "goals.php", "Goals"));
array_push($allPages, $dog = new page("Page", "dog.php", "My Furball"));
array_push($allPages, $github = new page("Profile", "https://github.com/cnarans", "GitHub"));
array_push($allPages, $facebook = new page("Profile", "https://www.facebook.com/colin.narans", "Facebook"));

$articles = array();
array_push($articles, $article1 = new page("Article", "ai.php", "The Future of AI"));
array_push($articles, $article2 = new page("Article", "web.php", "The Web as a Medium"));


function printNav($pages, $current){
	foreach($pages as $page){
		if($page->address==$current){
			echo $page->name . "  ";
		}
		else{
			$page->printLink();
			echo "  ";
		}
	}
}

?>