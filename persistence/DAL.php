<?php

class DAL{

	/*function preparing the request to find a user with his name and password*/
	static function getUser($username,$password)
	{
		$req = 'SELECT * FROM registered_user WHERE username=? AND password=?';
		$param  = array(0 => array($username, PDO::PARAM_STR) , 1 => array($password, PDO::PARAM_STR));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$user = NULL;
		foreach ($res as $data) {
			$user = new User($data["id"],$data["username"],$data["password"],$data["user_level"], $data["email"], $data["country"], $data["is_approved"]);
		}
		return $user;
	}

 /*function preparing the request to add a user to the database*/
	static function addUser($username, $password, $email, $role, $isApproved, $country)
	{
		$req = 'INSERT INTO registered_user (username, password,email, user_level, is_approved, nationality) VALUES(?,?,?,?,?,?)';
		$param  = array(0 => array($username, PDO::PARAM_STR) , 1 => array($password, PDO::PARAM_STR),2 => array($email, PDO::PARAM_STR),3 => array($role, PDO::PARAM_STR),4 => array($isApproved, PDO::PARAM_BOOL),5 => array($country, PDO::PARAM_STR));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function getAllAdventures(){
		$req = 'SELECT * FROM adventure';
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$adventures = array();
		foreach ($res as $data) {
			$adventures[] = new Adventure($data["id"],$data["title"],$data["description"],$data["country"]);
		}
		return $adventures;
	}
}
?>
