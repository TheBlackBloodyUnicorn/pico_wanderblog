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
				echo "<p>Test!</p>";
		
				$adventures = array();
				$adventures[] = new Adventure(1, "Adventure 01", "Test adventure", "Scotland", 01);
				$adventures[] = new Adventure(2, "Adventure 02", "Another test adventure", "France", 02);
				$adventures[] = new Adventure(3, "Adventure 03", "Yet another test adventure", "Austria", 03);
		
				if(isset($adventures)){
					foreach($adventures as $adventure){
						displayAdventureCompactForm($adventure);
					}
				}
			?>
		</div>
	</div>
</body>