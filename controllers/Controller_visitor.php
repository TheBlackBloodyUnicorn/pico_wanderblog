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
		
		//get the n adventures we wants to display here
		require ($rep.$views['home']);	
	}
}
?>