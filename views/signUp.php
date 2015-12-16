<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walk-a-blog | Sign up.</title>
    <link rel="stylesheet" href="./views/style.css" type="text/css" />
</head>
<body>
<div id="container">
    <form>
        Username:<br>
        <input type = "text" name = username placeholder = "This will be your username">
        <br>
        Password:<br>
        <input type ="text" name = password placeholder = "This will be your password">
        <br>
        Confirm password:<br>
        <input type = "text" name = confirmPass placeholder = "Please re-enter password">
        <br>
        Role:<br>
        <input type = "radio" name = role value = Reader>Reader
        <br>
        <input type = "radio" name = role value = Author>Author
        <br>
        <input type = "radio" name = role value = Administrator>Administrator
        <br>
        Email:<br>
        <input type = "text" name = email placeholder = "Enter your email address">
        <br>
        Country:<br>
        <input type = "text" name = country placeholder = "Enter your country">
        <br>
    </form>
    <button onclick="location.href='home.php'">Cancel</button>
    <button onclick="location.href='home.php'">Sign up</button>
</div>
</body>
</html>