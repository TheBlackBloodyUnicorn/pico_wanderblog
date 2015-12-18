<?php
//display the compact for of an adventure (used in the home page and profil page)
function displayAdventureCompactForm($adventure){
  echo "<div id='adventure-post'>";
  echo "<h1 id='adventure-post'><a href=\"./index.php?action=display_adventure&id_adventure=".$adventure->getId()."\">".$adventure->getTitle()."</a></h1>";
  echo "<img src=\"".$adventure->getPhotos()[0]."\" height=\"250\" width=\"500\">";
  echo "<p>Created by : ".$adventure->getAuthor()."</p>";
  echo "<p>Votes : ".$adventure->getNumberOfVotes()."</p>";
  echo "</div>";
  echo "<hr>";
}

//display the user profile
function displayProfile($user, $adventures)
{
  echo "<h1>".$user->getUsername()."</h1>";
  echo "<h3>nationality :</h3>".$user->getCountry()."";
  echo "<h3>role :</h3>".$user->getRole()."";
  echo "<h3>all adventures :</h3>";
          if(isset($adventures)){
            foreach($adventures as $adventure){
              displayAdventureCompactForm($adventure);
            }
          }
}
?>
