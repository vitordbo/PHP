<?php
    require('config/connection.php');

    if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
        // recive data and clean
        $email = cleanPost($_POST['email']);
        $password = cleanPost($_POST['password']);
        $encrypt_password = sha1($password); // funtion to encrypt the password

        // verify if the user exists
        $sql = $pdo->prepare("SELECT * FROM users WHERE email=? AND password=? LIMIT 1");
        $sql->execute(array($email,$encrypt_password));
        $user = $sql->fetch(PDO::FETCH_ASSOC); // to see if cath a user
    
        // if the user is in the system 
        if($user){
            // user exists => chek if the statis is confirmed
            if($user['status']=="confirmed"){
                //create token to authentication 
                $token = sha1(uniqid().date('d-m-Y-H-i-s'));
                            
                // update token for this user
                $sql = $pdo->prepare("UPDATE users SET token=? WHERE email=? AND password=?");
                if($sql->execute(array($token,$email,$encrypt_password))){
                    // keep this token on the Session
                    $_SESSION['TOKEN'] = $token;
                    header('location: restricted.php');
                }
            } else{
                $login_error = "Please confirm your registration by email";
            }
        }else{
            // user not exists 
            $login_error = "Invalid email or password";
        }
    }

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
    <form method="post">
        <h1>Login</h1>

        <?php if(isset($_GET['result']) && ($_GET['result']=="ok")){ ?>
            <div class="success animate__animated animate__rubberBand">
                User registered successfully
            </div>
        <?php }?>

        <?php if(isset($login_error)){ ?>
            <div class="general-error animate__animated animate__bounce">
            <?php echo $login_error; ?>
            </div>
        <?php } ?>
        
        <div class="input-group">
            <img class="input-icon" src="img/email.png">
            <input type="email" name="email" placeholder="Type your email" required>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/padlock.png">
            <input type="password" name="password" placeholder="Type your password" required>
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