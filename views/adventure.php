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
					echo "<h2>".$adventure->getAuthor()."</h2>";
					echo "<p>".$adventure->getCountry()."</p>";
					echo "<p>".$adventure->getDescription()."</p>";
					echo "<p>".$adventure->getNumberOfVotes()."</p>";
					
					for($c = 0; $c < sizeof($adventure->getPhotos()); c++){
						echo "<img src=".$adventure->getPhotos()[$c].">";
					}
					
					for($i = 0; $i < sizeof($adventure->getComments()); $i++){
						echo "<p>".$adventure->getComments()[$i]."</p>";
					}
					
					for($a = 0; $a < sizeof($adventure->getTags()); a++){
						echo"<p>".$adventure->getTags()[$a]."</p>";
					}
				}
			?>
		</div>
	</div>
</body>
