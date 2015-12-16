<?php
function displayAdventureCompactForm($adventure){
  echo "<h1><a href=\"index.php?action=display_adventure&id_adventure=".$adventure->getId()."\">".$adventure->getTitle()."</a></h1>";
  echo "<img src=\"".$adventure->getPhotos()[0]."\" height=\"250\" width=\"500\"/>";
}

?>
