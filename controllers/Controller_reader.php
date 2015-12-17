<?php
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
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

	private function up_vote(){
		if(isset($_POST['up_vote'])){
			$adv_id = isset($_POST['adventure']) ? $_POST['adventure'] : '';
			Model_user::vote($adv_id);
			$this->display_adventure($adv_id);
		}
	}

	private function remove_vote(){
		if(isset($_POST['down_vote'])){
			$adv_id = isset($_POST['adventure']) ? $_POST['adventure'] : '';
			Model_user::remove_vote($adv_id);
			$this->display_adventure($adv_id);
		}
	}

	private function display_adventure($id){
		global $rep, $views;
		$adventure = Model_adventure::getAdventureById($id);
		require($rep.$views["adventure"]);
	}
}
?>
