<?php
function displayAdventureCompactForm($adventure){
  echo "<div id='adventure-post'>";
  echo "<h1 id='adventure-post'><a href=\"index.php?action=display_adventure&id_adventure=".$adventure->getId()."\">".$adventure->getTitle()."</a></h1>";
  echo "<img src=\"".$adventure->getPhotos()[0]."\" height=\"250\" width=\"500\"/>";
  echo "<p>Created by : ".$adventure->getAuthor()."</p>";
  echo "<p>Votes : ".$adventure->getNumberOfVotes()."</p>";
  echo "</div>";
  echo "<hr>";
}

function displayProfile($user)
{
  echo "<h1 id='profile'>".$user->getUsername()."</h1>";
}
?>
