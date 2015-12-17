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
        $user = new User(1, 'davidg95', 'cheese', null, 'davidg95@hotmail.co.uk', 'UK', true);
        displayProfile($user);
        ?>
        <h1>Welcome to Walk-a-blog!</h1>
        <p>This website is all about travelling. Share your experience with other travellers. Click the link below to sign up!</p>
        <div id="adventure-container">
            <?php
            if(isset($adventures)){
                foreach($adventures as $adventure){
                    displayAdventureCompactForm($adventure);
                }
            }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
