<?php
class Adventure{
  private $id;
  private $title;
  private $description;
  private $author;
  private $country;
  private $comments; //array of comments corresponding to the content of comments objects
  private $photos; //array of string corresponding to the path of photos
  private $tags; //array of strings corresponding to tags
  private $numberOfVotes;
  private $user_id;


  public function getUser_id(){
    return $this->user_id;
  }
  private function setUser_id($new){
    $this->user_id = $new;
  }
  public function getAuthor(){
    return $this->author;
  }
  public function setAuthor($new){
    $this->author = $new;
  }
  public function getNumberOfVotes(){
    return $this->numberOfVotes;
  }
  public function setNumberOfVotes($new){
    $this->numberOfVotes = $new;
  }
  public function getId(){
    return $this->id;
  }
  private function setId($new){
    $this->id = $new;
  }
  public function getComments(){
    return $this->comments;
  }
  public function setComments($new){
    $this->comments = $new;
  }
  public function getPhotos(){
    return $this->photos;
  }
  public function setPhotos($new){
    $this->photos = $new;
  }
  public function getTags(){
    return $this->tags;
  }
  public function setTags($new){
    $this->tags = $new;
  }
  public function getTitle(){
    return $this->title;
  }
  private function setTitle($new){
    $this->title = $new;
  }
  public function getDescription(){
    return $this->description;
  }
  private function setDescription($new){
    $this->description = $new;
  }
  public function getCountry(){
    return $this->country;
  }
  private function setCountry($new){
    $this->country = $new;
  }

  public function __construct($id,$title,$description,$country,$user_id)
  {
  $this->setId($id);
  $this->setTitle($title);
  $this->setDescription($description);
  $this->setCountry($country);
  $this->setUser_id($user_id);
  }
}

?>
