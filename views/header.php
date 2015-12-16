<?php
echo "<head>";
    echo "<link rel = \"stylesheet\" href = \"./views/style.css\" type=\"text/css\">";
    echo "<title>".Walk-a-blog | Home."</title>";
echo "</head>";
echo "<body>";
echo "<div id=\"container\">";
    echo "<header>";
        echo "<div id=\"topbar\">";
            echo "<?php";
            echo "if(!isset(\$_SESSION['logged']) || !\$_SESSION['logged']){";
                echo "echo \"<div id=\"sign\">\";";
                echo "echo \"<form method=\"post\" action=\"index.php\">\";";
                echo "echo \"<input type=\"text\" name=\"username\" placeholder=\"Username\">\";";
                echo "echo \"<input type=\"password\" name=\"password\" placeholder=\"Password\">\";";
                echo "echo \"<input type=\"hidden\" name=\"action\" value=\"sign_in\">\";";
                echo "echo \"<input type=\"submit\" name=\"sign_in\" value=\"sign in\">\";";
                echo "echo \"</form>\";";
            echo "}else{";
                echo "echo \"<form method=\"post\" action=\"index.php\">\";";
                echo "echo \"<input type=\"hidden\" name=\"action\" value=\"sign_out\">\";";
                echo "echo \"<input type=\"submit\" name=\"\" value=\"sign out\">\";";
                echo "echo \"</form>\";";
                echo "echo \"</div>\";";
            echo "}";
            echo "?>";
echo "</div>";
echo "<img src = \"http://placehold.it/1200x300\">";
echo "</header>"
?>