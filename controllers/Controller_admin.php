<?php
class Controller_admin{
	function __construct($action) {
		global $rep, $views;

		$tabErreur=array();
		switch($action){
			case "test":
				$this->test();
				break;
				
			default:
				$errorView[] =	"action \"".$action."\" unknown";
				require ($rep.$views['error']);
				break;
		}
	}

	/*function to test the connection to the database*/
	function test(){
		global $rep, $views;
		$Tmessages=array();

		/*usualy we fill these parameters with the content of the post request*/
		$login="root" ;
		$password="toor" ;
		$role="admin";

		//$user = new User($login,$password,$role);
			
		$user2display = Model_user::get_user($login, $password);
		require($rep.$views['home']);
		
	}
}
?>