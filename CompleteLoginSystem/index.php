<?php
    require('db/connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <form>
        <h1>Login</h1>

        <?php if(isset($_GET['result'])){ ?>

        <?php }?>

        <div class="success">
        user registered successfully
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/mail.png">
            <input type="email" placeholder="Type your email">
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/password.png">
            <input type="password" placeholder="Type your password">
        </div>
    
        <button class="btn-blue" type="submit">Login</button>
        <a href="registration.php">Register</a>

    </form>
</body>
</html>