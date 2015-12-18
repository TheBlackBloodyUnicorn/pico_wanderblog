<?php
/*controller for authors action*/
class Controller_author{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();

		//check all the actions
		switch($action){
			case "add_display":
				$this->display_addpage();
				break;
			case "add_adventure":
			echo "good";
				$this->add_adventure();
				break;
			case "remove_adv":
				$this->remove_adventure();
				break;
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

 /*function to display the page to add an adventure*/
	private function display_addpage(){
		global $rep, $views;
		$countries = Model_user::get_countries();
		require($rep.$views['add_adventure']);
	}

	/*function called when the button create an adventure is pressed*/
	private function add_adventure(){
		global $rep, $views;

		if(isset($_POST['add_adventure'])){
			//get all the informations
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

				if($tag1 != $tag2 && $tag1 != $tag3 && $tag1 != ''){ //if first tag is unique and not empty
					Model_adventure::add_tag($adv_id, $tag1);
				}
				if($tag2 != $tag1 && $tag2 != $tag3 && $tag2 != ''){ //if second tag is unique and not empty
					Model_adventure::add_tag($adv_id, $tag2);
				}
				if($tag3 != $tag1 && $tag3 != $tag1 && $tag3 != ''){ //if third tag is unique and not empty
					Model_adventure::add_tag($adv_id, $tag3);
				}

				if(isset($_FILES["fileToUpload"]["name"])){
					Model_adventure::add_photo($adv_id, $_SESSION["id"],"./views/images/".$_FILES["fileToUpload"]["name"]);
				}
				require('./views/upload.php');
			}
			new Controller_visitor('home'); //display the homepage once we're done
		}
	}

  /*function to remove an adventure (should be in administrator controller)*/
	private function remove_adventure(){
		$adv_id = isset($_POST['adventure2remove']) ? $_POST['adventure2remove'] : '';
		Model_adventure::remove_adventure($adv_id);
		new Controller_visitor('home');
	}
}
?>
