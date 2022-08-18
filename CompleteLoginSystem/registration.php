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
    <form>
        <h1>Register</h1>

        <div class="general-error animate__animated animate__bounce">
            Error to user 
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/name.png">
            <input class="error-input" type="text" placeholder="Type your full name">
            <div class="error">
                Type again(turn dynamic later)
            </div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/mail.png">
            <input type="email" placeholder="Type your email">
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/password.png">
            <input type="password" placeholder="Type your password">
        </div>
    
        <div class="input-group">
            <img class="input-icon" src="img/openLock.png">
            <input type="password" placeholder="Type again your password">
        </div>

        <div class="input-group">
            <input type="checkbox" id="terms" name="terms" value="OK">
            <label for="terms">Do you agree with our <a class="link" href="#">terms</a>?  </label>
        </div>
    
        <button class="btn-blue" type="submit">Register</button>
        <a href="index.php">Alredy have an account</a>
    </form>

</body>
</html>