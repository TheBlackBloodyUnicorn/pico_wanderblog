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
			case "display_adventure":
				$this->display_adventure();
				break;
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

	private function display_home_page(){
		global $rep, $views;

		$adventures = Model_adventure::getAdventures(5);
		require ($rep.$views['home']);
	}

	private function display_adventure(){
		global $rep, $views;

			$adventureId = isset($_GET['id_adventure']) ? $_GET['id_adventure'] : '';
			$adventure = Model_adventure::getAdventureById($adventureId);

			require($rep.$views["adventure"]);
	}

}
?>
