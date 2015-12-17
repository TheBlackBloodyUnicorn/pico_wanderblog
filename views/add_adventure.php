<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Create an Adventure.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css"/>
</head>
<?php
    include 'header.php';
?>
<body>
	<div id="container">
		<form method="post" action="index.php">
			Title:<br>
			<input type = "text" name = "adventureTitle" placeholder = "Please enter a title.">
			<br>
			Country:<br>
			<select name = "adventureCountry" placeholder = "Where was your adventure?">
			<?php
				foreach($countries as $country){
					echo "<option value=\"".$country."\">".$country."</option>";
				}
			?>
			</select>
			<br>
			Description:<br>
			<input type = "text" name = "adventureDesc" placeholder = "Please tell us about your adventure.">
			<br>
			Photos:<br>
			<br>
			Tags:<br>
			<input type = "text" name = "adventureTags" placeholder = "Enter some relevant tags.">
			<br>
			<input type = "submit" name = "submitButton" value = "Create!">
			<input type="hidden" name="action" value="add_adventure">
		</form>
    <form action="./views/upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
    <form method="post" action="index.php">
      <input type="submit" name="home" value="home">
      <input type="hidden" name="action" value="home">
    </form>
	</div>
</body>
</html>
