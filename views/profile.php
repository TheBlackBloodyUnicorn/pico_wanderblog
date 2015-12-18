<?php
require_once('common_functions.php');
?>

<html>
<head>
    <link rel = "stylesheet" href = "./views/style.css" type="text/css">
    <link rel = "stylesheet" href = "style.css" type="text/css">
    <link rel ="shortcut icon" href="./views/Images/globe.ico">
    <title>Walk-a-blog | Profile</title>
</head>
<body>

<div id="container">

    <?php
    include 'header.php';
    ?>
    <div id="content">
        <?php
        $user = new User(1, 'davidg95', 'cheese', null, 'davidg95@hotmail.co.uk', 'UK', true);
        displayProfile($_SESSION);
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
