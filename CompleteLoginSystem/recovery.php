<?php
    require('config/connection.php');

    // To use PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'config/PHPMailer/src/Exception.php';
    require 'config/PHPMailer/src/PHPMailer.php';
    require 'config/PHPMailer/src/SMTP.php';

    if(isset($_POST['email']) && !empty($_POST['email'])){

        // recive data and clean
        $email = cleanPost($_POST['email']);
        $status = "confirmed";

        // verify if the user exists
        $sql = $pdo->prepare("SELECT * FROM users WHERE email=? AND status=? LIMIT 1");
        $sql->execute(array($email,$status));
        $user = $sql->fetch(PDO::FETCH_ASSOC); // to see if cath a user
    
        // if the user is in the system 
        if($user){
        // send other email
        $mail = new PHPMailer(true);
        $cod = sha1(uniqid());

        // update recovery code for this user
        $sql = $pdo->prepare("UPDATE users SET recovery_password=? WHERE email=?");
        if($sql->execute(array($code,$email))){
            try {
                //Recipients
                $mail->setFrom('system@email.com', 'Login System');  // who is sending => my system
                $mail->addAddress($email, $name);   //Add a recipient
    
                //Content
                $mail->isHTML(true);     //Set email format to HTML
                $mail->Subject = 'Change password';
                $mail->Body    = '<h1>Recovery your password:</h1><br><br><a style="background:green; text-decoration: none; color:white; padding:20px; border-radius: 5px;" href="http://localhost/PHP/CompleteLoginSystem/changePassword.php?cod_confirm='.$cod.'">Change your password</a>';
                
                $mail->send();
                header('location: thanksRecovery.php');
    
            }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
        }

        }else{
            $error_user = "Fail to find this e-mail";
        }
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
        <h1>Recovery password</h1>
        
        <?php if(isset($error_user)){ ?>
            <div class="general-error animate__animated animate__bounce">
            <?php echo $error_user; ?>
            </div>
        <?php } ?>
        
        <p>
            Type your e-mail
        </p>
        <div class="input-group">
            <img class="input-icon" src="img/email.png">
            <input type="email" name="email" placeholder="Type your email" required>
        </div>
    
        <button class="btn-blue" type="submit">Recovery password</button>
        <a href="index.php">Back to Login</a>
    </form>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</html>
