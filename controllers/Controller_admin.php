<?php
class Controller_admin{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();
		switch($action){				
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}


}
?>