<!DOCTYPE html>
<?php
    require_once('common_functions.php');
	require_once('models/Adventure.php');
	include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | All Adventures</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css"/>
</head>
<body>
	<div id="container">
		<div>
			<?php
				$testAdventure1 = new Adventure();
				$testAdventure1->setTitle("Adventure 1");
				$testAdventure2 = new Adventure();
				$testAdventure2->setTitle("Adventure 2");
				$testAdventure3 = new Adventure();
				$testAdventure3->setTitle("Adventure 3");
		
				$adventures = array($testAdventure1, $testAdventure2, $testAdventure3);
		
				/*if(isset($adventures)){
					for($i = 0; $i < sizeof($adventures); $i++){
						displayAdventureCompactForm($adventure);
					}
				}*/
			?>
		</div>
	</div>
</body>