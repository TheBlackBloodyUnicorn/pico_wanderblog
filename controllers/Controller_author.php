<?php
class Controller_author{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();
		switch($action){
			case "add_display":
				$this->display_addpage();
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
}
?>
