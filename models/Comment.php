<?php
class Comment{
  private $user_name;
  private $text;

  public function getUser_name(){
    return $this->user_name;
  }
  public function getText(){
    return $this->text;
  }
  private function setUser_name($new){
    $this->user_name = $new;
  }
  private function setText($new){
    $this->text = $new;
  }
  public function __construct($username, $text)
  {
  $this->setText($text);
  $this->setUser_name($username);
  }

}



?>
