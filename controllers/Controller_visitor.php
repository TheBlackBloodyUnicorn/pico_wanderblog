<?php
class Controller_visitor{
	function __construct($action) {
		global $rep, $views;

		$tabError=array();

		switch($action){
			case NULL:
				$this->display_home_page();
				break;
			case "home":
				$this->display_home_page();
				break;
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

	private function display_home_page(){
		global $rep, $views;

		$adventures = Model_adventure::getAdventuresWithHighestVotes(5);
		require ($rep.$views['home']);
	}
}
?>
