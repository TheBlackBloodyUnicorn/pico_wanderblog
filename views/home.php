<h1>This is a test</h1>
<form method="post" action="index.php">
	<input type="hidden" value="home" name="action" id="action"/>
	<input type="submit" name="" value="add">
</form>
<?php
if(isset($user2display)){
	echo $user2display->getRole();
}

?>