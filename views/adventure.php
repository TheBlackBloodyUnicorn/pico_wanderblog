<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Adventures.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css" />
	<link rel ="shortcut icon" href="./views/Images/globe.ico">
</head>
<?php
    include 'header.php';
?>
<body>
	<div id="container">
		<div>
			<?php
				if(isset($adventure)){
					echo "<h1>".$adventure->getTitle()."</h1>";
					echo "<h2>Author: ".$adventure->getAuthor()."</h2>";
					echo "<p>Country: ".$adventure->getCountry()."</p>";
					echo "<p>Description: ".$adventure->getDescription()."</p>";
					echo "<p>Votes: ".$adventure->getNumberOfVotes()."</p>";

					echo "<h3>Photos:</h3>";
					for($c = 0; $c < sizeof($adventure->getPhotos()); $c++){
						echo "<img src=".$adventure->getPhotos()[$c]." height=350 width=350>";
					}

					echo "<h3>Tags:</h3>";
					echo "<p>";
					for($a = 0; $a < sizeof($adventure->getTags()); $a++){
						echo"".$adventure->getTags()[$a]." ";
					}
          echo "</p>";

					echo "<h3>Comments:</h3>";
					for($i = 0; $i < sizeof($adventure->getComments()); $i++){
						echo "<p>".$adventure->getComments()[$i]->getUser_name().": ".$adventure->getComments()[$i]->getText()."</p>";
					}
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
</body>
</html>
