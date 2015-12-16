<?php
class Model_adventure{

/*find and return $number adventures object filled with all informations*/
  public static function getAdventuresWithHighestVotes($number){
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
      $adventure->setNumberOfVotes($nbVotes);
      $adventure->setTags($tags);
      $adventure->setPhotos($photos);
      $adventure->setComments($comments);
      $nAdventures[] = $adventure;
      $i++;
      if($i >= $number)
        break;
    }

    return $nAdventures;
  }
}


?>
