<?php
class Model_user
{
	public static function get_user($login, $password){
		return DAL::getUser($login, $password);
	}
	


}

?>