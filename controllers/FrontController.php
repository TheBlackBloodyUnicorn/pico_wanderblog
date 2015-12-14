<?php
class FrontController{
	function __construct() {
		global $rep, $views; //declare as global the variables needed that are in conf.php
		session_start();

		$roles=array("administrator", "reader", "author"); //roles defined for the website
		$viewError = array();//array to stock error messages
		$TmessagesConnection = array();//error message specific to the connexion view

		/*
		* create a list of action for every type of users
		* actions correspond to the action field of a get/post method in the html
		*/
		$actionsAdministrator = array(NULL,"home","","","","","");
		$actionsReader = array(NULL,"home","","");
		$actionsVisitor = array(NULL,"home","","");
		$actionsAuthor = array(Null, "home","");
		$actionsFront = array("","","");

		//get the action
		$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL ;
		$action=Cleaning::cleanString($action); //cleanning the action
		
		try{
			if($this->isConnected){
				//do things
			} else {
				if($action == 'connection')
					$this->sign_in();
				elseif(in_array($action,$actionsVisitor))
					$cont=new Controller_visitor($action);
				else{
					$viewError[] =	"action \"".$action."\" unknown";
					require ($rep.$views['error']);
				}
			}
		}catch (Exception $e){
			$viewError[] = "unexpected error";
			require($rep.$views['error']);
		}

		//if($action != NULL){
		//	$cont=new Controller_admin($action);
		//}
		
		exit(0);
	}

	private function sign_in(){
		global $rep, $views, $TmessagesConnection;
		$Terreurs=array();

		if(isset($_POST['sign_in'])){ // If we clicked on the sign_in button
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$pwd = isset($_POST['password']) ? $_POST['password'] : '';

			if(Validation::val_username_password($username,$pwd,$TmessagesConnection)) {//variable verifications
				Model_user::sign_in($username,$pwd);//connect the user
				//maybe update messagesError to explain the user the problem ?		
			}
		}
		$cont=new Controller_visitor('home'); // if variables are not correct
	}

	private function isConnected(){
		if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
			return false;
		}
		return true;
	}
}


?>