<?php
class Adventure{
  private $title;
  private $description;
  private $country;
  private $comments; //array of comments corresponding to the content of a comment
  private $photos; //array of string corresponding to the path of photos
  private $tags; //array of strings corresponding to tags


  public function getComments(){
    return $this->comments;
  }
  private function setComments($new){
    $this->comments = $new;
  }
  public function getPhotos(){
    return $this->photos;
  }
  private function setPhotos($new){
    $this->photos = $new;
  }
  public function getTags(){
    return $this->tags;
  }
  private function setTags($new){
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
    return $this->coutry;
  }
  private function setCountry($new){
    $this->country = $new;
  }

  public function __construct($title,$description,$country, $tags, $photos, $comments)
  {
  $this->setTitle($title);
  $this->setDescription($description);
  $this->setCountry($country);
  $this->setTags($tags);
  $this->setPhotos($photos);
  $this->setComments($comments);
  }
}

?>
