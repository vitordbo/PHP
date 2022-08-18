<?php 
    require('db/connection.php');

    // checkbox is just empty or not empty 
    // check if exists a post
    if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_password'])) {
        
        // check inputs to see if they are empty or not 
        if(empty($_POST['full_name']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['repeat_password']) or empty($_POST['terms'])){
            $generalError = "All fields most be filled";
        } else { 
            // it's not empty => see if is valid 

        }

        
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <form method="post">
        <h1>Register</h1>

        <?php if(isset($generalError)){ ?>
            <div class="general-error animate__animated animate__bounce">
            <?php echo $generalError; ?>
            </div>
        <?php } ?>
        

        <div class="input-group">
            <img class="input-icon" src="img/name.png">
            <input <?php if(isset($generalError)) {echo 'class="error-input"';} ?> name="full_name" type="text" placeholder="Type your full name" required>
           <!-- <div class="error">
                Type again(turn dynamic later)
            </div> -->
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/mail.png">
            <input <?php if(isset($generalError)) {echo 'class="error-input"';} ?> type="email" name="email" placeholder="Type your email" required>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/password.png">
            <input  <?php if(isset($generalError)) {echo 'class="error-input"';} ?> type="password" name="password" placeholder="Type your password" required>
        </div>
    
        <div class="input-group">
            <img class="input-icon" src="img/openLock.png">
            <input <?php if(isset($generalError)) {echo 'class="error-input"';} ?> type="password" name="repeat_password" placeholder="Type again your password" required>
        </div>

        <div <?php if(isset($generalError)) {echo 'class="input-group error-input"';}else{echo 'class="input-group"';} ?>>
            <input type="checkbox" id="terms" name="terms" value="OK" required>
            <label for="terms">Do you agree with our <a class="link" href="#">terms</a>?  </label>
        </div>
    
        <button class="btn-blue" type="submit">Register</button>
        <a href="index.php">Alredy have an account</a>
    </form>

</body>
</html>