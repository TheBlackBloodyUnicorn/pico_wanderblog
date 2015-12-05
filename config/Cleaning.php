<?php class Cleaning{
	//class to clean parameters in order to avoid code injection attacks
	
	//cleans URLs 
	public static function cleanUrl($link)
	{
	   return filter_var($link,FILTER_SANITIZE_URL);
	}

	//cleans strings 
	public static function cleanString($string)
	{
		return filter_var($string,FILTER_SANITIZE_STRING);	
	}

	//cleans mail addresses
	public static function cleanEmail($email)
	{
		return filter_var($email,FILTER_SANITIZE_EMAIL);	
	}

	//clean integer
	public static function cleanInt($int)
	{
		return filter_var($int,FILTER_SANITIZE_NUMBER_INT);	
	}		


}