<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Adventures.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css" />
	<link rel ="shortcut icon" href="./views/Images/globe.ico">
</head>
<body>
<div id="container">
<?php
    include 'header.php';
?>

		<div id="content">
			<?php
				if(isset($adventure)){
          if($adventure->getUser_id()==$_SESSION["id"] || $_SESSION["role"]== "administrator"){
            echo "<form method=\"post\" action=\"index.php\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"remove_adv\">";
            echo "<input type=\"hidden\" name=\"adventure2remove\" value=\"".$adventure->getId()."\">";
            echo "<input type=\"submit\" name=\"remove_adv\" value=\"remove this adventure\">";
            echo "</form>";
          }
					echo "<h1>".$adventure->getTitle()."</h1>";
					echo "<h2>by ".$adventure->getAuthor()."</h2>";
					echo "<p>Country: ".$adventure->getCountry()."</p>";
					echo "<p>".$adventure->getDescription()."</p>";

					echo "<h3>Photos:</h3>";
					for($c = 0; $c < sizeof($adventure->getPhotos()); $c++){
                        echo "<img src=" . $adventure->getPhotos()[$c] . " height=350 width=350>";
					}

					echo "<h3>Tags:</h3>";
					echo "<p>";
					for($a = 0; $a < sizeof($adventure->getTags()); $a++){
						echo"".$adventure->getTags()[$a]." ";
					}
          echo "</p>";

                    echo "<h3>Votes: ".$adventure->getNumberOfVotes()."</h3>";
					echo "<h3>Comments:</h3>";
                    echo "<div id='comments-container'>";
                    if(sizeof($adventure->getComments()) == 0){
                        echo "<p><i>There are no comments on this post</i></p>";
                    }
					for($i = 0; $i < sizeof($adventure->getComments()); $i++){
						echo "<div id='comment'><p><b>".$adventure->getComments()[$i]->getUser_name()."</b><br> ".$adventure->getComments()[$i]->getText()."</p></div><hr>";
					}
                    echo "</div>";
          if((isset($_SESSION['logged']) || $_SESSION['logged']) && $_SESSION["id"]!= $adventure->getUser_id()){
            if($_SESSION['role']== "reader"||$_SESSION['role']== "author" || $_SESSION['role']== "administrator"){
              if(in_array($adventure->getId(),$_SESSION['votes'])){
                echo "<form method=\"post\" action=\"index.php\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"down_vote\">";
                echo "<input type=\"hidden\" name=\"adventure\" value=\"".$adventure->getId()."\">";
                echo "<input type=\"submit\" name=\"down_vote\" value=\"remove the vote\">";
                echo "</form>";
              } else{
                echo "<form method=\"post\" action=\"index.php\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"up_vote\">";
                echo "<input type=\"hidden\" name=\"adventure\" value=\"".$adventure->getId()."\">";
                echo "<input type=\"submit\" name=\"up_vote\" value=\"vote for this adventure\">";
                echo "</form>";
              }
            }
          }
          if(isset($_SESSION['logged']) || $_SESSION['logged']){
            if($_SESSION['role']== "reader"||$_SESSION['role']== "author" || $_SESSION['role']== "administrator"){
              echo "<form method=\"post\" action=\"index.php\">";
              echo "<textarea rows=\"10\" cols=\"80\" type = \"text\" name = \"content\"></textarea><br>";
              echo "<input type=\"hidden\" name=\"action\" value=\"comment\">";
              echo "<input type=\"hidden\" name=\"adventure2comment\" value=\"".$adventure->getId()."\">";
              echo "<input type=\"submit\" name=\"comment\" value=\"add a comment\">";
              echo "</form>";
            }
          }
				}
			?>
		</div>
	</div>
<?php
include 'footer.php';
?>
</body>
</html>
