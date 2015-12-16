<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Adventures.</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
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
						echo "<p>".$adventure->getComments()[$i]."</p>";
					}
				}
			?>
		</div>
	</div>
</body>
