<?php 
    require('config/connection.php');

     // To use PHPMailer
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
 
     require 'config/PHPMailer/src/Exception.php';
     require 'config/PHPMailer/src/PHPMailer.php';
     require 'config/PHPMailer/src/SMTP.php';

    if(isset($_GET['cod']) && !empty($_GET['cod'])) {
        // clean get 
        $cod = cleanPost($_GET['cod']);

                
        // check if exists a post
        if(isset($_POST['password']) && isset($_POST['repeat_password'])) {
            
            // check inputs to see if they are empty or not 
            if(empty($_POST['password']) or empty($_POST['repeat_password'])){
                $generalError = "All fields most be filled";
            } else { 
                // it's not empty => see if is valid (clean values)
                $password = cleanPost($_POST['password']);
                $encrypt_password = sha1($password); // funtion to encrypt the password
                $repeat_password = cleanPost($_POST['repeat_password']);

                // chek if the password is bigger than 6 
                if(strlen($password) < 6){
                    $passwErr = "Password must be bigger than 6";
                }

                // chek if the repeat passoword is equal to the password
                if($password !== $repeat_password){
                    $repeatpasswErr = "Repeat password is different from the password";
                }

                // do this if everything is ok => if there is not a error
                if(!isset($generalError)  && !isset($passwErr) && !isset($repeatpasswErr)){
                    // chek if this user is has the recovrey code
                    $sql = $pdo->prepare("SELECT * FROM users WHERE recovery_password=? LIMIT 1");
                    $sql->execute(array($cod));
                    $user = $sql->fetch(); // to see if cath a user

                    // if the user is not in the system => register the user 
                    if(!$user){
                       echo "Not valid";
                    }else{
                        // if exists a user with this code
                        // update token for this user
                        $sql = $pdo->prepare("UPDATE users SET password=? WHERE recovery_code=? AND password=?");
                        if($sql->execute(array($password,$cod))){
                            header('location: index.php');
                        }
                    }
                }

                }
            } 
    } else {
        header('location:index.php');
    }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovery</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <form method="post">
        <h1>Change password</h1>

        <?php if(isset($generalError)){ ?>
            <div class="general-error animate__animated animate__bounce">
            <?php echo $generalError; ?>
            </div>
        <?php } ?>
        
        <div class="input-group">
            <img class="input-icon" src="img/padlock.png">
            <input  <?php if(isset($generalError) or isset($passwErr)) {echo 'class="error-input"';} ?> type="password" name="password" placeholder="Type your new password" <?php if(isset($_POST['password'])){ echo "value='".$_POST['password']."'";} ?> required>
            <?php if(isset($passwErr)){ ?>
            <div class="error"><?php echo $passwErr; ?> </div> 
            <?php } ?>
        </div>
    
        <div class="input-group">
            <img class="input-icon" src="img/unlock.png">
            <input <?php if(isset($generalError) or isset($repeatpasswErr)) {echo 'class="error-input"';} ?> type="password" name="repeat_password" placeholder="Type again your new password" <?php if(isset($_POST['repeat_password'])){ echo "value='".$_POST['repeat_password']."'";} ?> required>
            <?php if(isset($repeatpasswErr)){ ?>
            <div class="error"><?php echo $repeatpasswErr; ?> </div> 
            <?php } ?>
        </div>
    
        <button class="btn-blue" type="submit">Recovery</button>
    </form>

</body>
</html>