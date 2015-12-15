<!--<form method="post" action="index.php">
        <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <input type="hidden" name="sign_in">
        <p class="submit"><input type="submit" name="action" value="sign_in"></p>

</form>-->

<html>
<head>
        <link rel = "stylesheet" href = "style.css" type="text/css">
        <title>Walk-a-blog | Home</title>
</head>
<body>
<div id="container">
    <header>
        <div id="topbar">
            <a id="sign" href="signIn.html">Sign in</a>
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
            global $user, $password, $base, $host;

            $con = mysqli_connect($host, $user, $password);

            mysqli_select_db($base, $con);

            $query = "SELECT * FROM 'adventure'";

            $adventures = mysqli_query($query);

            while($row = mysqli_fetch_array($adventures, MYSQLI_ASSOC)){
                $name = $row['name'];

                echo "<p>$name</p>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>