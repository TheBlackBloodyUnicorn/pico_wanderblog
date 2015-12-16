<?php
echo "<div id=\"container\">";
    echo "<header>";
        echo "<div id=\"topbar\">";
        if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
            echo "<div id=\"sign\">";
            echo "<form method=\"post\" action=\"index.php\">";
            echo "<input type=\"text\" name=\"username\" placeholder=\"Username\">";
            echo "<input type=\"password\" name=\"password\" placeholder=\"Password\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"sign_in\">";
            echo "<input type=\"submit\" name=\"sign_in\" value=\"sign in\">";
            echo "</form>";
            echo "<form method=\"post\" action=\"index.php\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"display_sign_up\">";
            echo "<input type=\"submit\" name=\"\" value=\"sign up\">";
            echo "</form>";
            echo "</div>";
        }else{
            echo "<div id=\"sign\">";
            echo "<form method=\"post\" action=\"index.php\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"sign_out\">";
            echo "<input type=\"submit\" name=\"\" value=\"sign out\">";
            echo "</form>";
            echo "</div>";
        }
echo "</div>";
//Secho "<img src = \"http://placehold.it/1200x300\">";
echo "</header>";
    echo"<nav>";
        echo"<ul>";
            echo"<li><a href=\"./views/home.php\">Home</a></li>";
            echo"<li><a href=\"./views/adventure.php\">Adventures</a></li>";
            echo"<li><a href=\"#\">Link</a></li>";
            echo"<li><a href=\"#\">Link</a></li>";
            echo"<li><a href=\"#\">Link</a></li>";
            echo"<li><a href=\"#\">Link</a></li>";
        echo"</ul>";
    echo"</nav>";
?>
