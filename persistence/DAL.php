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

	/*find a user information knowing his id*/
	static function getUserById($id){
		$req = 'SELECT * FROM registered_user WHERE id=?';
		$param  = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$user = new User($res[0]["id"],$res[0]["username"],$res[0]["password"],$res[0]["user_level"], $res[0]["email"], $res[0]["nationality"], $res[0]["is_approved"]);
		return $user;
	}

/*find an return a list of all the adventures*/
	static function getAllAdventures(){
		$req = 'SELECT * FROM adventure';
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$adventures = array();
		foreach ($res as $data) {
			$adventures[] = new Adventure($data["id"],$data["title"],$data["description"],$data["country"]);
		}
		return $adventures;
	}

 /*count the number of votes for the given adventure*/
	static function countVotesForAdventure($id){
		$req = 'SELECT * FROM vote WHERE adventure_id=?';
		$param = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$count = 0;
		foreach ($res as $data) {
			$count ++;
		}
		return $count;
	}

	/*get the path all the photos from the given adventure*/
	static function getPhotosAdventure($id){
		$req = 'SELECT path FROM photo WHERE adventure_id=?';
		$param = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$photos = array();
		foreach ($res as $data) {
			$photos[] = $data["path"];
		}
		return $photos;
	}

	/*get the tags of the given adventure*/
	static function getTagsAdventure($id){
		$req = 'SELECT name FROM tag WHERE adventure_id=?';
		$param = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$tags = array();
		foreach ($res as $data) {
			$tags[] = $data["name"];
		}
		return $tags;
	}

	/*retrun all the comments of the given adventure*/
	static function getCommentsAdventure($id){
		$req = 'SELECT * FROM comment WHERE adventure_id=?';
		$param = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$comments = array();
		foreach ($res as $data){
			$text = $data["content"];
			$user = DAL::getUserById($data["user_id"]);
			$comments[] = new Comment($user->getUsername(),$text);
		}
		return $comments;
	}

	static function getAdventureById($id){
		$req = 'SELECT * FROM adventure WHERE id=?';
		$param = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$adventures = array();
		foreach ($res as $data) {
			$adventures[] = new Adventure($data["id"],$data["title"],$data["description"],$data["country"]);
		}
		return $adventures[0];
	}

	static function getAllCountries(){
		$req = 'SELECT * FROM country';
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$countries = array();
		foreach ($res as $data) {
			$countries[] = $data["name"];
		}
		return $countries;
	}
}
?>
