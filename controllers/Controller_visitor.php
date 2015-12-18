<?php
class Controller_visitor{
	/*controller for all visitor actions */
	function __construct($action) {
		global $rep, $views, $errors;

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
			case "sign_up":
				$this->sign_up();
				break;
			case "display_sign_up":
				$this->display_sign_up();
				break;
			case "all_adventures":
				$this->display_all_adventures();
				break;
			case "profilevisitor":
				$this->display_profile();
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

	private function display_sign_up(){
		global $rep, $views, $errors;
		$countries = Model_user::get_countries();
		require($rep.$views["sign_up"]);
	}

	/*function called when we click on the signup button*/
	private function sign_up(){
		global $rep, $views, $errors;
		$errors=array(); //use to display the error message if needed on the sign up form

		if(isset($_POST['sign_up'])){ // If we clicked on the sign_up button
			//get all the inputs values
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$pwd1 = isset($_POST['password']) ? $_POST['password'] : '';
			$pwd2 = isset($_POST['confirmPass']) ? $_POST['confirmPass'] : '';
			$role = isset($_POST['role']) ? $_POST['role'] : '';
			$email = isset($_POST['email']) ? $_POST['email'] : '';
			$country = isset($_POST['country']) ? $_POST['country'] : '';

			if($pwd1 != $pwd2){ //check the passwords
				$errors[]="the two passwords must be similar";
				$this->display_sign_up();
			}
			//check the email
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)||$email == ""){
				$errors[]="invalid email";
				$this->display_sign_up();
			}
			//check if passwords and usernames are valids
			else if(Validation::val_password($pwd2,$errors) || Validation::val_username($username)) {//variable verifications
				Model_user::sign_up($username,$pwd2,$role,$email,$country);
				$cont=new Controller_visitor("home"); // if variables are not correct
			}
		}
	}

	private function display_all_adventures(){
		global $rep, $views;
		$adventures = Model_adventure::getAllAdventures();
		require($rep.$views["all_adventures"]);
	}

	private function display_profile(){
		global $rep, $views;
		$user_id = isset($_GET['id_user']) ? $_GET['id_user'] : '';
		$user = Model_user::getUserById($user_id);
		$adventures = Model_adventure::getUserAdventures($_SESSION["id"]);
		require($rep.$views["profile"]);
	}

}
?>
