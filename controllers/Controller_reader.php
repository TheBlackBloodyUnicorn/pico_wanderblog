<?php
/*controller for reader actions*/
class Controller_reader{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();
		switch($action){
			case "down_vote":
				$this->remove_vote();
				break;
			case "up_vote":
				$this->up_vote();
				break;
			case "profile":
				$this->display_profile();
				break;
			case "comment":
				$this->add_comment();
				break;
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

	/*function called to cast a vote*/
	private function up_vote(){
		if(isset($_POST['up_vote'])){
			$adv_id = isset($_POST['adventure']) ? $_POST['adventure'] : '';
			Model_user::vote($adv_id);
			$this->display_adventure($adv_id);
		}
	}

	/*function called to remove a vote*/
	private function remove_vote(){
		if(isset($_POST['down_vote'])){
			$adv_id = isset($_POST['adventure']) ? $_POST['adventure'] : '';
			Model_user::remove_vote($adv_id);
			$this->display_adventure($adv_id);
		}
	}

	/*function displaying the adventure with the id of the adventure*/
	private function display_adventure($id){
		global $rep, $views;
		$adventure = Model_adventure::getAdventureById($id);
		require($rep.$views["adventure"]);
	}

	/*function displaying the profile of a user*/
	private function display_profile(){
			global $rep, $views;
			$user = Model_user::getUserById($_SESSION["id"]);
			$adventures = Model_adventure::getUserAdventures($_SESSION["id"]);
			require($rep.$views["profile"]);
	}

	/*function called when adding a comment*/
	private function add_comment(){
		if(isset($_POST['comment'])){
			$adv_id = isset($_POST['adventure2comment']) ? $_POST['adventure2comment'] : '';
			$content = isset($_POST['content']) ? $_POST['content'] : '';
			Model_adventure::add_comment($adv_id, $_SESSION["id"], $content);
			$this->display_adventure($adv_id);
		}
	}
}
?>
