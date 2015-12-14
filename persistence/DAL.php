<?php

class DAL{

	static function getUser($username,$password)
	{
		$req='SELECT * FROM registered_user WHERE username=? AND password=?';
		$param  = array(0 => array($username, PDO::PARAM_STR) , 1 => array($password, PDO::PARAM_STR));
		$res= DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$user=NULL;
		foreach ($res as $data) {
			$user=new User($data["username"],$data["password"],$data["user_level"], $data["email"], $data["country"], $data["is_approved"]);
		}
		return $user;
	}

	static function addUser($username, $password, $email, $role, $isApproved, $country)
	{
		$req='INSERT INTO registered_user (username, password,email, user_level, is_approved, nationality) VALUES(?,?,?,?,?,?)';
		$param  = array(0 => array($username, PDO::PARAM_STR) , 1 => array($password, PDO::PARAM_STR),2 => array($email, PDO::PARAM_STR),3 => array($role, PDO::PARAM_STR),4 => array($isApproved, PDO::PARAM_BOOL),5 => array($country, PDO::PARAM_STR));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}
}
?>
