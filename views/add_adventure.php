<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Create an Adventure.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css"/>
	<link rel ="shortcut icon" href="./views/Images/globe.ico">
</head>
<body>
<div id="container">
<?php
    include 'header.php';
?>
	<div id="content">
		<form method="post" action="index.php" enctype="multipart/form-data">
			Title:<br>
			<input type = "text" name = "title" placeholder = "Please enter a title.">
			<br>
			Country:<br>
			<select name = "country" placeholder = "Where was your adventure?">
			<?php
				foreach($countries as $country){
					echo "<option value=\"".$country."\">".$country."</option>";
				}
			?>
			</select>
			<br>
			Description:<br>
			<textarea rows="10" cols="80" type = "text" name = "description" placeholder = "Please tell us about your adventure.">
      </textarea>
			<br>
			Photos:<br>
			<br>
			Tags:<br>
			<input type = "text" name = "tag1" placeholder = "Enter some relevant tags."><br>
      <input type = "text" name = "tag2" placeholder = "Enter some relevant tags."><br>
      <input type = "text" name = "tag3" placeholder = "Enter some relevant tags.">
			<br>
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br>
			<input type = "submit" name = "add_adventure" value = "Create">
			<input type="hidden" name="action" value="add_adventure">
		</form>
		</div>
	</div>
<?php
include 'footer.php';
?>
</body>
</html>
