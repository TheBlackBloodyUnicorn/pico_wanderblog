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
			$errors[]="Type a password";
			return false;
		}
		if(strlen($pwd)< 5){
			$errors[]="Min lenght 5";
			return false;
		}
		if(strlen($pwd)>40){
			$errors[]="max legth 40";
			return false;
		}
		return true;
	}
}


?>
