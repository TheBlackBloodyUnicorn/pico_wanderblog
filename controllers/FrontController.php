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
		$actionsAdministrator = array(NULL,"home","down_vote","up_vote","display_adventure","add_display","add_adventure","profile","all_adventures","comment", "remove_adv","profilevisitor");
		$actionsReader = array(NULL,"home","down_vote","up_vote","display_adventure","profile", "all_adventures","comment", "profilevisitor");
		$actionsVisitor = array(NULL,"home","display_adventure","display_sign_up","sign_up","all_adventures","profilevisitor");
		$actionsAuthor = array(Null, "home","down_vote","up_vote","display_adventure","add_display", "add_adventure", "profile","all_adventures","comment","remove_adv","profilevisitor");

		//get the action
		$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL ;
		$action=Cleaning::cleanString($action); //cleanning the action

		try{
			if($this->isConnected()){ //if we are connected
				if($action=='sign_out'){
					$this->sign_out();
				}
				switch($_SESSION['role']){ //check the role and call the good controller
					case "administrator":
						if(in_array($action,$actionsAdministrator)){
							//if an admin is connected but trying to perform a visitor action
							if(in_array($action,$actionsVisitor)){
								$cont=new Controller_visitor($action);
							}
							//if an admin is connected but trying to perform a reader action
							else if(in_array($action, $actionsReader)){
								$cont=new Controller_reader($action);
							}
							//if an admin is connected but trying to perform a author action
							else if(in_array($action, $actionsAuthor)){
								$cont=new Controller_author($action);
							}
							//if an admin is connected but trying to perform an administrator action
							else{
								$cont=new Controller_administrator($action);
							}
						}else{
							$dVueEreur[] =	"action \"".$action."\" unknown";
							require ($rep.$views['error']);
						}
						break;
					case "reader":
						if(in_array($action,$actionsReader)){
							if(in_array($action,$actionsVisitor)){
								$cont=new Controller_visitor($action);
							}else{
								$cont=new Controller_reader($action);
							}
						}
						break;
					case "author":
						if(in_array($action,$actionsAuthor)){
							if(in_array($action,$actionsVisitor)){
								$cont=new Controller_visitor($action);
							}
							else if(in_array($action, $actionsReader)){
								$cont=new Controller_reader($action);
							}
							else{
								$cont=new Controller_author($action);
							}
						}else{
							$dVueEreur[] =	"action \"".$action."\" unknown";
							require ($rep.$views['error']);
						}
						break;
				}
			}
			else { // if we are not connected
				if($action == 'sign_in'){
					$this->sign_in();
				}
				elseif(in_array($action,$actionsVisitor)){
					$cont = new Controller_visitor($action);
				}
				else{
					$viewError[] =	"action \"".$action."\" unknown";
					require ($rep.$views['error']);
				}
			}
		}
		catch (Exception $e){
			$viewError[] = "unexpected error";
			require($rep.$views['error']);
		}

		exit(0);
	}

	//method to sign in
	private function sign_in(){
		global $rep, $views, $TmessagesConnection;

		if(isset($_POST['sign_in'])){ // If we clicked on the sign_in button
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$pwd = isset($_POST['password']) ? $_POST['password'] : '';

			if(Validation::val_username($username,$TmessagesConnection) && Validation::val_password($pwd,$TmessagesConnection)) {//variable verifications
				Model_user::sign_in($username,$pwd);//connect the user
				//maybe update messagesError to explain the user the problem ?
			}
		}
		$cont=new Controller_visitor("home"); // if variables are not correct
	}

	private function sign_out(){
		Model_user::sign_out();
		$_REQUEST['action']=NULL;//to make it easier to come back to the home page
		$cont=new FrontController();
	}

	/*check if someone is connected*/
	private function isConnected(){
		if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
			return false;
		}
		return true;
	}
}
?>
