<?php
class Controller_author{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();
		switch($action){
			case "add_display":
				$this->display_addpage();
				break;
			case "add_adventure":
				$this->add_adventure();
				break;
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

	private function display_addpage(){
		global $rep, $views;
		$countries = Model_user::get_countries();
		require($rep.$views['add_adventure']);
	}

	private function add_adventure(){
		if(isset($_POST['add_adventure'])){
			$title = isset($_POST['title']) ? $_POST['title'] : '';
			$country = isset($_POST['country']) ? $_POST['country'] : '';
			$description = isset($_POST['description']) ? $_POST['description'] : '';
			$tag1 = isset($_POST['tag1']) ? $_POST['tag1'] : '';
			$tag2 = isset($_POST['tag2']) ? $_POST['tag2'] : '';
			$tag3 = isset($_POST['tag3']) ? $_POST['tag3'] : '';
			$adv_id = 0;
			if($title != '' && $country != '' && $description != ''){
				Model_adventure::addAdventure($title,$country,$description,$_SESSION["id"]);
				$adv_id = Model_adventure::get_adv_id($_SESSION["id"],$title,$country );
				if($tag1 != '' || $tag2 != '' || $tag3 != ''){
					echo $tag1;
					if($tag1 != $tag2 && $tag1 != $tag3){ //if first tag is unique
						Model_adventure::add_tag($adv_id, $tag1);
					}
					if($tag2 != $tag1 && $tag2 != $tag3){ //if second tag is unique
						Model_adventure::add_tag($adv_id, $tag2);
					}
					if($tag3 != $tag1 && $tag3 != $tag1){ //if third tag is unique
						Model_adventure::add_tag($adv_id, $tag3);
					}
				}
			}


			//add tags
			//upload photos
			//add photos
		}
	}
}
?>
