<?php 

class DAL{

	static function  getUser($login,$password)
	{
		$req='SELECT * FROM registered_user WHERE username=? AND password=?';
		$param  = array(0 => array($login, PDO::PARAM_STR) , 1 => array($password, PDO::PARAM_STR));
		$res= DB::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$user=NULL;
		foreach ($res as $data) {
			$user=new User($data["username"],$data["password"],$data["user_level"]);
		}
		return $user;
	}
}
?>