<?php
class Model_user
{

	public static function sign_in($username, $password){
		global $rep, $vues, $TmessagesConnection;

		$user = DAL::getUser(Cleaning::cleanString($username),Cleaning::cleanString($password)); //on teste si c'est dans la bdd (en nettoyant au passage)
		
		if(!is_null($user)){
			$_SESSION['username'] = $user->getUsername();
			$_SESSION['role'] = $user->getRole();
			$_SESSION['logged'] = true;
		}
		else {
			$TmessagesConnection[]="username or password unknown";
		}
	}


	public static function get_user($username, $password){
		return DAL::getUser($username, $password);
	}
	


}

?>