<?php
class Controller_author{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();
		switch($action){
			case "add_display":
				$countries = Model_user::get_countries();
				require($rep.$views['add_adventure']);
				$countries = Model_user::get_countries();break;
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}
}
?>
