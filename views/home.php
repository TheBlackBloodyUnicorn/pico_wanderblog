<?php
    require_once('common_functions.php');
?>
<html>
<?php
    include 'header.php';
?>

    <nav>
        <ul>
            <li><a href="./views/home.php">Home</a></li>
            <li><a href="./views/adventure.php">Adventures</a></li>
        </ul>
    </nav>
    <div id="content">
        <h1>Welcome to Walk-a-blog!</h1>
        <p>>This website is all about travelling. Share your experience with other travellers.</p>
        <button onclick="location.href='./views/signUp.php'">Sign up</button>
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
