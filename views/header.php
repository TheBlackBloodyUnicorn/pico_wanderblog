<?php
    echo "<header>";
        echo "<div id=\"topbar\">";
        if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
            echo "<div id=\"sign\">";

            echo "<form id = 'form-sign' method=\"post\" action=\"./index.php\">";
            echo "<input type=\"text\" name=\"username\" placeholder=\"Username\">";
            echo "<input type=\"password\" name=\"password\" placeholder=\"Password\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"sign_in\">";
            echo "<input type=\"submit\" name=\"sign_in\" value=\"sign in\">";
            echo "</form>";
            echo "<form id='form-sign' method=\"post\" action=\"./index.php\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"display_sign_up\">";
            echo "<input type=\"submit\" name=\"\" value=\"sign up\">";
            echo "</form>";
            echo "</div>";
        }else{
            echo "<div id=\"sign\">";
            echo "<form method=\"post\" action=\"./index.php\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"sign_out\">";
            echo "<input type=\"submit\" name=\"\" value=\"sign out\">";
            echo "</form>";
            echo "</div>";
        }
echo "</div>";
echo "<img src = \"./views/images/logo.png">";
echo "</header>";
    echo"<nav>";
        echo"<ul>";
            echo"<li><a href=\"./index.php?action=home\">Home</a></li>";
            echo"<li><a href=\"./index.php?action=all_adventures\">Adventures</a></li>";
            if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
              echo"<li><a href=\"#\">Link</a></li>";
              echo"<li><a href=\"#\">Link</a></li>";
              echo"<li><a href=\"#\">Link</a></li>";
              echo"<li><a href=\"#\">Link</a></li>";
            }else{
              if($_SESSION['role'] == "author"){
                echo"<li><a href=\"index.php?action=profile\">Profile</a></li>";
                echo"<li><a href=\"index.php?action=add_display\">Add an adventure</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
              }
              else if($_SESSION['role'] == "reader"){
                echo"<li><a href=\"index.php?action=profile\">Profile</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
              }
              else if($_SESSION['role'] == "administrator"){
                echo"<li><a href=\"index.php?action=profile\">Profile</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
                echo"<li><a href=\"#\">Link</a></li>";
              }
            }
        echo"</ul>";
    echo"</nav>";
?>
