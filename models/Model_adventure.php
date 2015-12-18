<?php
/*all method needed to get information from the database*/
class Model_adventure{

  public static function getAllAdventures(){
    $adventures = DAL::getAllAdventures();
    $photos = array();
    $tags = array();
    $comments = array();
    $nAdventures = array();
    $i = 0;

    //require everything needed to create a complete adventure object
    foreach ($adventures as $adventure){
      $nbVotes = DAL::countVotesForAdventure($adventure->getId());
      $photos = DAL::getPhotosAdventure($adventure->getId());
      $tags = DAL::getTagsAdventure($adventure->getId());
      $comments = DAL::getCommentsAdventure($adventure->getId());
      $author = DAL::getUserById($adventure->getUser_id());
      $adventure->setNumberOfVotes($nbVotes);
      $adventure->setTags($tags);
      $adventure->setPhotos($photos);
      $adventure->setComments($comments);
      $adventure->setAuthor($author->getUsername());
      $nAdventures[] = $adventure;
    }

    return $nAdventures;
  }

  /*find and return $number adventures object filled with all informations*/
  public static function getAdventures($number){
    $adventures = DAL::getAllAdventures();
    $photos = array();
    $tags = array();
    $comments = array();
    $nAdventures = array();
    $i = 0;

    //require everything needed to create a complete adventure object
    foreach ($adventures as $adventure){
      $nbVotes = DAL::countVotesForAdventure($adventure->getId());
      $photos = DAL::getPhotosAdventure($adventure->getId());
      $tags = DAL::getTagsAdventure($adventure->getId());
      $comments = DAL::getCommentsAdventure($adventure->getId());
      $author = DAL::getUserById($adventure->getUser_id());
      $adventure->setNumberOfVotes($nbVotes);
      $adventure->setTags($tags);
      $adventure->setPhotos($photos);
      $adventure->setComments($comments);
      $adventure->setAuthor($author->getUsername());
      $nAdventures[] = $adventure;
      $i++;
      if($i >= $number)
        break;
    }
    return $nAdventures;
  }

 /*get an adventure from the database and create a object adventure will all the informations*/
  public static function getAdventureById($id){
    $adventure = DAL::getAdventureById(Cleaning::cleanInt($id));
    $nbVotes = DAL::countVotesForAdventure($adventure->getId());
    $photos = DAL::getPhotosAdventure($adventure->getId());
    $tags = DAL::getTagsAdventure($adventure->getId());
    $comments = DAL::getCommentsAdventure($adventure->getId());
    $author = DAL::getUserById($adventure->getUser_id());
    $adventure->setNumberOfVotes($nbVotes);
    $adventure->setTags($tags);
    $adventure->setPhotos($photos);
    $adventure->setComments($comments);
    $adventure->setAuthor($author->getUsername());

    return $adventure;
  }

  /*function to add a adventure (we clean the parameters in the request to the dal method)*/
  public static function addAdventure($title,$country,$description,$user_id){
    DAL::addAdventure(Cleaning::cleanInt($user_id),Cleaning::cleanString($title),Cleaning::cleanString($description),$country);
  }

  /*return the id of an adventure with the given parameters*/
  public static function get_adv_id($user_id,$title,$country){
    $res = DAL::get_adv_id(Cleaning::cleanInt($user_id),Cleaning::cleanString($title),$country);
    return $res;
  }

  public static function add_tag($adv_id, $tag){
    DAL::addTag($adv_id, Cleaning::cleanString($tag));
  }

  public static function add_photo($adv_id, $user_id, $path){
    DAL::addPhoto($adv_id, Cleaning::cleanInt($user_id), Cleaning::cleanString($path));
  }

  /*return all the adventures created by a user in an array*/
  public static function getUserAdventures($user_id){
    $adventures = DAL::getUserAdventures($user_id);
    $photos = array();
    $tags = array();
    $comments = array();
    $nAdventures = array();
    $i = 0;
    
    foreach ($adventures as $adventure){
      $nbVotes = DAL::countVotesForAdventure($adventure->getId());
      $photos = DAL::getPhotosAdventure($adventure->getId());
      $tags = DAL::getTagsAdventure($adventure->getId());
      $comments = DAL::getCommentsAdventure($adventure->getId());
      $author = DAL::getUserById($adventure->getUser_id());
      $adventure->setNumberOfVotes($nbVotes);
      $adventure->setTags($tags);
      $adventure->setPhotos($photos);
      $adventure->setComments($comments);
      $adventure->setAuthor($author->getUsername());
      $nAdventures[] = $adventure;
    }

    return $nAdventures;
  }

  public static function add_comment($adv_id, $user_id, $content){
    DAL::addComment($user_id, $adv_id,Cleaning::cleanString($content));
  }

  public static function remove_adventure($id){
    DAL::removeAdventure($id);
  }
}


?>
