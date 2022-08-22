<?php 
    require('db/connection.php');

    // checkbox is just empty or not empty 
    // check if exists a post
    if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_password'])) {
        
        // check inputs to see if they are empty or not 
        if(empty($_POST['full_name']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['repeat_password']) or empty($_POST['terms'])){
            $generalError = "All fields most be filled";
        } else { 
            // it's not empty => see if is valid (clean values)
            $name = cleanPost($_POST['full_name']);
            $email = cleanPost($_POST['email']);
            $password = cleanPost($_POST['password']);
            $encrypt_password = sha1($password); // funtion to encrypt the password
            $repeat_password = cleanPost($_POST['repeat_password']);
            $checkbox = cleanPost($_POST['terms']);

            // only letters and spaces in name => check name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }

            // chek if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }

            // chek if the password is bigger than 6 
            if(strlen($password) < 6){
                $passwErr = "Password must be bigger than 6";
            }

            // chek if the repeat passoword is equal to the password
            if($password !== $repeat_password){
                $repeatpasswErr = "Repeat password is different from the password";
            }

            //chek if the checkbox is ok
            if($checkbox !=="ok"){
                $checkErr = "Not marked";
            } 

            // do this if everything is ok => if there is not a error
            if(!isset($generalError) && !isset($nameErr) && !isset($emailErr) && !isset($passwErr) && !isset($repeatpasswErr) && !isset($checkErr)){
                // chek if this user is already in the system (email is already in the system)
                $sql = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
                $sql->execute(array($email));
                $user = $sql->fetch(); // to see if cath a user

                // if the user is not in the system => register the user 
                if(!$user){
                    $recovery_password="";
                    $token="";
                    $status = "new"; // first time in the database => change to ok later
                    $registration_date = date('d/m/Y');
                    $sql = $pdo->prepare("INSERT INTO users VALUES (null,?,?,?,?,?,?,?)");
                    
                    if($sql->execute(array($name,$email,$encrypt_password,$recovery_password,$token,$status,$registration_date))){
                        header('location: index.php?result=ok');
                    }
                }else{
                    // if the user is already in the system => show error message
                    $generalError = "User already in the system";
                }
            }

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
            <img class="input-icon" src="img/user.png">
            <input <?php if(isset($generalError) or isset($nameErr)) {echo 'class="error-input"';} ?> name="full_name" type="text" placeholder="Type your full name" <?php if(isset($_POST['full_name'])){ echo "value='".$_POST['full_name']."'";} ?> required>
            <?php if(isset($nameErr)){ ?>
            <div class="error"><?php echo $nameErr; ?> </div> 
            <?php } ?>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/email.png">
            <input <?php if(isset($generalError) or isset($emailErr)) {echo 'class="error-input"';} ?> type="email" name="email" placeholder="Type your email" <?php if(isset($_POST['email'])){ echo "value='".$_POST['email']."'";} ?> required>
            <?php if(isset($emailErr)){ ?>
            <div class="error"><?php echo $emailErr; ?> </div> 
            <?php } ?>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/padlock.png">
            <input  <?php if(isset($generalError) or isset($passwErr)) {echo 'class="error-input"';} ?> type="password" name="password" placeholder="Type your password" <?php if(isset($_POST['password'])){ echo "value='".$_POST['password']."'";} ?> required>
            <?php if(isset($passwErr)){ ?>
            <div class="error"><?php echo $passwErr; ?> </div> 
            <?php } ?>
        </div>
    
        <div class="input-group">
            <img class="input-icon" src="img/unlock.png">
            <input <?php if(isset($generalError) or isset($repeatpasswErr)) {echo 'class="error-input"';} ?> type="password" name="repeat_password" placeholder="Type again your password" <?php if(isset($_POST['repeat_password'])){ echo "value='".$_POST['repeat_password']."'";} ?> required>
            <?php if(isset($repeatpasswErr)){ ?>
            <div class="error"><?php echo $repeatpasswErr; ?> </div> 
            <?php } ?>
        </div>

        <div <?php if(isset($generalError) or isset($checkErr)) {echo 'class="input-group error-input"';}else{echo 'class="input-group"';} ?>>
            <input type="checkbox" id="terms" name="terms" value="ok" required>
            <label for="terms">Do you agree with our <a class="link" href="#">terms</a>?  </label>
        </div>
    
        <button class="btn-blue" type="submit">Register</button>
        <a href="index.php">already have an account</a>
    </form>

</body>
</html>