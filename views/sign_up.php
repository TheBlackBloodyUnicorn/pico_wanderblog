<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Sign up.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css" />
    <link rel ="shortcut icon" href="./views/Images/globe.ico">
    <style>
        body{
            background-color: #ffffff;
            background-image: none;
        }
    </style>
</head>
<body>
<div id="sign-up">
    <form method="post" action="index.php">
        Username:<br>
        <input type = "text" name = "username" placeholder = "This will be your username">
        <br>
        Password:<br>
        <input type ="password" name = "password" placeholder = "This will be your password">
        <br>
        Confirm password:<br>
        <input type = "password" name = "confirmPass" placeholder = "Please re-enter password">
        <br>
        Role:<br>
        <input type = "radio" name = "role" value = Reader>Reader
        <br>
        <input type = "radio" name = "role" value = Author>Author
        <br>
        Email:<br>
        <input type = "text" name = "email" placeholder = "Enter your email address">
        <br>
        Country:<br>
        <select name = "country" placeholder = "nationality">
          <?php
          foreach($countries as $country){
            echo "<option value=\"".$country."\">".$country."</option>";
          }
          ?>
        </select>
        <br>
        <input type="submit" name="sign_up" value="sign up">
        <input type="hidden" name="action" value="sign_up">
    </form>
    <?php
    if(isset($errors)){
      foreach($errors as $error){
        echo "<p>".$error."</p>";
      }
    }
    ?>
    <form method="post" action="index.php">
      <input type="submit" name="home" value="home">
      <input type="hidden" name="action" value="home">
    </form>
</div>
</body>
</html>
