<?php
require_once('common_functions.php');
?>

<html>
<head>
    <link rel = "stylesheet" href = "./views/style.css" type="text/css">
    <link rel = "stylesheet" href = "style.css" type="text/css">
    <title>Walk-a-blog | Profile</title>
</head>
<body>

<div id="container">

    <?php
    include 'header.php';
    ?>
    <div id="content">
        <?php
        displayProfile($user, $adventures);
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
