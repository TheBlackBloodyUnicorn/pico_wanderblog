<!DOCTYPE html>
<?php
    require_once('common_functions.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | All Adventures</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css"/>
</head>
<body>
<div id="container">
<?php
    include 'header.php';
?>
		<div id="content">
			<?php
				if(isset($adventures)){
					for($i = 0; $i < sizeof($adventures); $i++){
						displayAdventureCompactForm($adventures[$i]);
					}
				}
			?>
		</div>
	<?php
	include 'footer.php';
	?>
	</div>
</body>
</html>