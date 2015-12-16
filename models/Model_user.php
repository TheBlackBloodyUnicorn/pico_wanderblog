<?php
class Model_user
{
	/*function connecting a user*/
	public static function sign_in($username, $password){
		global $rep, $vues, $TmessagesConnection;

		//test if the user is in the database (we clean the strings to avoid attcks)
		$user = DAL::getUser(Cleaning::cleanString($username),Cleaning::cleanString($password));

		//set the session variable with the correct parameters
		if(!is_null($user)){
			$_SESSION['username'] = $user->getUsername();
			$_SESSION['role'] = $user->getRole();
			$_SESSION['logged'] = true;
		}
		else {
			$TmessagesConnection[]="username or password unknown";
		}
	}

	/*function to disconnect a user*/
	public static function sign_out(){
		session_destroy(); //destroy the session
	}

	public static function get_user($username, $password){
		return DAL::getUser($username, $password);
	}



}

?>
