<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Adventures.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css" />
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
					echo "<p>".$adventure->getDescription()."</p>";
					echo "<p>Votes: ".$adventure->getNumberOfVotes()."</p>";

					for($c = 0; $c < sizeof($adventure->getPhotos()); $c++){
						echo "<img src=".$adventure->getPhotos()[$c].">";
					}

					for($a = 0; $a < sizeof($adventure->getTags()); $a++){
						echo"<p>".$adventure->getTags()[$a]."</p>";
					}

					for($i = 0; $i < sizeof($adventure->getComments()); $i++){
						echo "<p>".$adventure->getComments()[$i]->getText()."</p>";
					}
          echo "sjqd";
          if(isset($_SESSION['logged']) || $_SESSION['logged']){
            echo "yes";
            if($_SESSION['role']== "reader"||$_SESSION['role']== "author" || $_SESSION['role']== "administrator"){
              echo "yes1";
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
				}
			?>
		</div>
	</div>
</body>
</html>
