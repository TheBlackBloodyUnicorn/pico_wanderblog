<?php
class Validation{

	
	//basic verification of username
	static function val_username($username,&$errors){
		if($username == ''){
			$errors[]="Enter a username";
			return false;
		}
		return true;
	}
	
	//basic verification of password
	static function val_password($pwd,&$errors){
		if($pwd == ''){
			$errors[]="Enter a password";
			return false;
		}
		return true;
	}
}


?>