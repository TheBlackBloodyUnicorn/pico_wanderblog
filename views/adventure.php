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
					echo <h2>$adventure->getAuthor()</h2>;
					echo <p>$adventure->getCountry()</p>;
					echo <p>$adventure->getDescription()</p>;
					echo <p>$adventure->getNumberOfVotes()</p>;

				}
			?>
		</div>
	</div>
</body>
