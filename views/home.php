<h1>This is a test</h1>
<form method="post" action="index.php">
	<input type="hidden" value="test" name="action" id="action"/>
	<input type="submit" name="" value="ajouter">
</form>
<?php
if(isset($user2display)){
	echo $user2display->getRole();
}

?>