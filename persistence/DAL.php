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
			$user = new User($data["id"],$data["username"],$data["password"],$data["user_level"], $data["email"], $data["nationality"], $data["is_approved"]);
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
			$adventures[] = new Adventure($data["id"],$data["title"],$data["description"],$data["country"],$data["user_id"]);
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

	/*get the adventure with the given id*/
	static function getAdventureById($id){
		$req = 'SELECT * FROM adventure WHERE id=?';
		$param = array(0 => array($id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$adventures = array();
		foreach ($res as $data) {
			$adventures[] = new Adventure($data["id"],$data["title"],$data["description"],$data["country"],$data["user_id"]);
		}
		return $adventures[0];
	}

	/*get all countries*/
	static function getAllCountries(){
		$req = 'SELECT * FROM country';
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$countries = array();
		foreach ($res as $data) {
			$countries[] = $data["name"];
		}
		return $countries;
	}

	static function addTag($adventure_id, $name){
		$req = 'INSERT INTO tag (adventure_id, name) VALUES(?,?)';
		$param  = array(0 => array($adventure_id, PDO::PARAM_INT) , 1 => array($name, PDO::PARAM_STR));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function removeTagAdventure($adventure_id){
		$req = 'DELETE FROM tag WHERE adventure_id=?';
		$param = array(0 => array($adventure_id, PDO::PARAM_INT));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function addPhoto($adventure_id, $user_id, $path){
		$req = 'INSERT INTO photo (adventure_id, user_id, path) VALUES(?,?,?)';
		$param = array(0 => array($adventure_id, PDO::PARAM_INT),1 => array($user_id, PDO::PARAM_INT),2 => array($path, PDO::PARAM_STR));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function removePhoto($adventure_id, $user_id){
		$req = 'DELETE FROM photo WHERE adventure_id=? AND user_id=?';
		$param = array(0 => array($adventure_id, PDO::PARAM_INT),1 => array($user_id, PDO::PARAM_INT));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function addComment($user_id,$adventure_id, $content){
		$req = 'INSERT INTO comment (user_id, adventure_id, content,date) VALUES(?,?,?,now())';
		$param = array(0 => array($user_id, PDO::PARAM_INT),1 => array($adventure_id, PDO::PARAM_INT),2 => array($content, PDO::PARAM_STR));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function removeComment($comment_id){
		$req = 'DELETE FROM comment WHERE id=?';
		$param = array(0 => array($comment_id, PDO::PARAM_INT));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function vote( $adventure_id,$user_id){
		$req = 'INSERT INTO vote (adventure_id, user_id) VALUES(?,?)';
		$param = array(0 => array($adventure_id, PDO::PARAM_INT),1 => array($user_id, PDO::PARAM_INT));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function removeVote($adventure_id,$user_id){
		$req = 'DELETE FROM vote WHERE adventure_id=? AND user_id=?';
		$param = array(0 => array($adventure_id, PDO::PARAM_INT),1 => array($user_id, PDO::PARAM_INT));
		DB::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static function getAllVotes($user_id){
		$req = 'SELECT adventure_id FROM vote WHERE user_id=?';
		$param = array(0 => array($user_id, PDO::PARAM_INT));
		$res = DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$votes = array();
		foreach ($res as $data) {
			$votes[] = $data["adventure_id"];
		}
		return $votes;
	}

	static function addAdventure($user_id, $title, $description, $country){

	}

	static function removeUser($user_id){

	}

	static function accept_user($user_id){

	}

	static function removeAdventure($adventure_id){

	}
}
?>
