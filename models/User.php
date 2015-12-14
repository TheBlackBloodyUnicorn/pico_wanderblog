<?php

class User
{	
	private $username;//VARCHAR(20)
	private $password;//VARCHAR(20)
	private $role;//enum

	
    public function getUsername()
    {
        return $this->username;
    }
    
    private function setUsername($new)
    {
        $this->username = $new;
    }
	
	public function getPassword()
    {
        return $this->password;
    }
    
    private function setPassword($new)
    {
        $this->password = $new;
    }
	
    public function getRole()
    {
        return $this->role;
    }
    
    private function setRole($new)
    {
        $this->role = $new;
    }

    public function __construct($username,$password,$role)
    {
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setRole($role);
    }	
}
?>