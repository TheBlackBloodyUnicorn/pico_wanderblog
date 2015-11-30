<?php
class frontController{
	function __construct() {
		global $rep, $views; //declare as global the variables needed that are in conf.php

		session_start();

		$roles=array("administrator", "reader", "author"); //roles defined for the website
		$dViewError = array();//array to stock error messages

		/*
		* create a list of action for every type of users
		* actions correspond to the action field of a get/post method in the html
		*/
		$actionsAdministrator = array(NULL,"","","","","","");
		$actionsReader = array(NULL,"","","");
		$actionsVisitor = array(NULL,"","","");
		$actionsAuthor = array(Null, "","");
		$actionsFront = array("","","");

		require ($rep.$views['home']); //require the home page
	}

}


?>