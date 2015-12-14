<?php

class User
{
	private $username;//VARCHAR(20)
	private $password;//VARCHAR(20)
	private $role;//enum
	private $email;
	private $country;
	private $isAccepted;

	public function getIsAccepted()
	{
			return $this->isAccepted;
	}

	private function setIsAccepted($new)
	{
			$this->isAccepted = $new;
	}

	public function getCountry()
	{
			return $this->country;
	}

	private function setCountry($new)
	{
			$this->country = $new;
	}

	public function getEmail()
	{
			return $this->email;
	}

	private function setEmail($new)
	{
			$this->email = $new;
	}

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

    public function __construct($username,$password,$role, $email, $country, $isAccepted)
    {
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setRole($role);
		$this->setEmail($email);
		$this->setCountry($country);
		$this->setIsAccepted($isAccepted);
    }
}
?>
