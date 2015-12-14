<?php
//load config
require_once(__DIR__.'/config/conf.php');

//autoload all the classes
require_once(__DIR__.'/config/Autoload.php');
Autoload::load();

//start the frontController
$cont = new FrontController();


?> 