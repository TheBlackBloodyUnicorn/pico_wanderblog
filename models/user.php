<?php

class user
{	
	private $login;//VARCHAR(20)
	private $password;//VARCHAR(20)
	private $role;//enum

	
    public function getLogin()
    {
        return $this->login;
    }
    
    private function setLogin($new)
    {
        $this->login = $new;
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

    public function __construct($login,$password,$role)
    {
		$this->setLogin($login);
		$this->setPassword($password);
		$this->setRole($role);
    }	
}
?>