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
		$actionsAdministrator = array(NULL,"","","","","","");
		$actionsReader = array(NULL,"","","");
		$actionsVisitor = array(NULL,"","","");
		$actionsAuthor = array(Null, "","");
		$actionsFront = array("","","");

		//get the action
		$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL ;
		$action=Cleaning::cleanString($action); //cleanning the action
		
		try{
			$this->connection();

		}catch (Exception $e){
			$viewError[] = "unexpected error";
			require($rep.$views['error']);
		}

		//if($action != NULL){
		//	$cont=new Controller_admin($action);
		//}
		
		exit(0);
	}

	private function connection(){
		global $rep, $views, $TmessagesConnection;
		$Terreurs=array();

		if(isset($_POST['connection'])){ // If we clicked on the connection button
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$pwd = isset($_POST['password']) ? $_POST['password'] : '';

			if(Validation::val_username_password($username,$pwd,$TmessagesConnection)) {//variable verifications
				Model_user::connexion($username,$pwd);//connect the user
				//maybe update messagesError to explain the user the problem ?		
			}
		}
		$cont=new Controller_visitor('home'); // if variables are not correct
	}
}


?>