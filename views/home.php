<?php
    require_once('common_functions.php');
?>
<html>
<head>
    <link rel = "stylesheet" href = "./views/style.css" type="text/css">
    <title>Walk-a-blog | Home</title>
</head>
<body>
<div id="container">
    <header>
        <div id="topbar">
            <?php
            if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
                echo "<div id=\"sign\">";
                echo "<form method=\"post\" action=\"index.php\">";
                echo "<input type=\"text\" name=\"username\" placeholder=\"Username\">";
                echo "<input type=\"password\" name=\"password\" placeholder=\"Password\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"sign_in\">";
                echo "<input type=\"submit\" name=\"sign_in\" value=\"sign in\">";
                echo "</form>";
            }else{
                echo "<form method=\"post\" action=\"index.php\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"sign_out\">";
                echo "<input type=\"submit\" name=\"\" value=\"sign out\">";
                echo "</form>";
                echo "</div>";
            }
            ?>
            <a id="sign" href="signUp.html">Sign Up</a>
        </div>
        <img src = "http://placehold.it/1200x300">
    </header>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="adventures.php">Adventures</a></li>
        </ul>
    </nav>
    <div id="content">
        <h1>Welcome to Walk-a-blog!</h1>
        <p>This website is all about travelling. Share your experience with other travellers.</p>
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
</div>
</body>
</html>
