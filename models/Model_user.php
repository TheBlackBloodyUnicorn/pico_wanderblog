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
			$_SESSION['is_confirmed'] = $user->getIsAccepted();
			$_SESSION['id'] = $user->getId();
			$_SESSION['logged'] = true;
			$_SESSION['votes'] = DAL::getAllVotes($user->getId());
		}
		else {
			$TmessagesConnection[]="username or password unknown";
		}
	}

	public static function sign_up($username, $password, $role, $email, $country){
		DAL::addUser(Cleaning::cleanString($username), Cleaning::cleanString($password),Cleaning::cleanEmail($email), $role, 0, $country);
		Model_user::sign_in($username,$password);
	}

	/*function to disconnect a user*/
	public static function sign_out(){
		session_destroy(); //destroy the session
	}

	public static function get_user($username, $password){
		return DAL::getUser($username, $password);
	}

	public static function get_countries(){
		return DAL::getAllCountries();
	}

	public static function vote($adv_id){
		DAL::vote(Cleaning::cleanInt($adv_id), $_SESSION['id']);
		$_SESSION['votes'][]=$adv_id;
	}

	public static function remove_vote($adv_id){
		DAL::removeVote(Cleaning::cleanInt($adv_id), $_SESSION['id']);
		unset($_SESSION['votes'][array_search($adv_id,$_SESSION['votes'])]);
		//var_dump($_SESSION['votes']);
	}

}

?>
