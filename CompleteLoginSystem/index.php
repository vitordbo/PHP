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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <form>
        <h1>Login</h1>

        <?php if(isset($_GET['result']) && ($_GET['result']=="ok")){ ?>
            <div class="success animate__animated animate__rubberBand">
                User registered successfully
            </div>
        <?php }?>


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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php if(isset($_GET['result']) && ($_GET['result']=="ok")){ ?> 
    <script>
        // after 3 seconds the green alert of success will disappear
        setTimeout(() => {
            $('.success').addClass('hide');
        }, 3000);
    </script>
    <?php }?>
</html>