<?php
class Model_adventure{

/*find and return $number adventures object filled with all informations*/
  public static function getAdventures($number){
    $adventures = DAL::getAllAdventures();
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
      $i++;
      if($i >= $number)
        break;
    }

    return $nAdventures;
  }

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
}


?>
