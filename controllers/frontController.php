<?php
class frontController{
	function __construct() {
		global $rep, $views; //declare as global the variables needed that are in conf.php

		require ($rep.$views['home']); //require the home page
	}

}


?>