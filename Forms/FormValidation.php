<?php
  //Think SECURITY when processing PHP forms!
  //Proper validation of form data is important to protect your form from hackers and spammers!

  // Get x Post

  // When to use GET?
  // GET may be used for sending non-sensitive data.

  // Information sent from a form with the GET method is visible to everyone 
  //(all variable names and values are displayed in the URL). GET also has limits on the 
  //amount of information to send. The limitation is about 2000 characters. However, 
  //because the variables are displayed in the URL, it is possible to bookmark the page. 
  //This can be useful in some cases.

  // Note: GET should NEVER be used for sending passwords or other sensitive information!

  // When to use POST?
  // Developers prefer POST for sending form data.

  // Information sent from a form with the POST method is invisible to others 
  //(all names/values are embedded within the body of the HTTP request) and has no 
  //limits on the amount of information to send.

  // Moreover POST supports advanced functionality such as support for multi-part binary input while uploading files to server.
  // However, because the variables are not displayed in the URL, it is not possible to bookmark the page.

  $errorName ="";
  $errorEmail="";
  $errorPassword="";
  $errorConfirmPassword="";

  // if exists an post 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (empty($_POST['name'])){ // if post name is empty
      $errorName = "Please, type your name";
    } else {
      // save post if is not empty 
      $name = cleanPost($_POST['name']);
      
      // test if is a valid text => using regular expression
      if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
        // other error if gets here
        $errorName = "Please, type only letters and spaces";

      }
    }


  // if post email is empty
  if (empty($_POST['email'])){ 
    $errorEmail = "Please, type your email";
  } else {
    // save post if is not empty 
    $email = cleanPost($_POST['email']);
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      // other error if gets here
      $errorEmail = "Please, type a valid email";

    }
  }

  // if post password is empty
  if (empty($_POST['password'])){ 
    $errorPassword = "Please, type your password";
  } else {
    // save post if is not empty 
    $password = cleanPost($_POST['password']);
    
    if(strlen($password) < 6){
      // other error if gets here
      $errorPassword = "Please, type a valid password with minimum of 6 characters";

    }
  }

   // if post password confirm is empty
   if (empty($_POST['confirm_password'])){ 
    $errorConfirmPassword = "Please, type your password again";
  } else {
    // save post if is not empty 
    $confirm_password = cleanPost($_POST['confirm_password']);
    
    if($confirm_password !== $password){
      // other error if gets here
      $errorConfirmPassword = "Please, this password is not equal to the first one";

    }
  }

  if(($errorName=="") && ($errorEmail=="") && ($errorPassword=="") && ($errorConfirmPassword=="")){
    // if everything is ok
    header('Location: Thanks.php'); // go to next page
  }

}

  function cleanPost($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <main>
    <h1><span>PHP</span><br>Form Validation</h1>

     <form method="post">
        <!-- full name -->
        <label> Name </label>
        <input type="text" <?php if(!empty($errorName)) {echo "class='invalido'";} ?> <?php if (isset($_POST['name'])) {echo "value='".$_POST['name']."'";} ?> name="name" placeholder="Type your full name" required>
        <br><span class="erro"><?php echo $errorName ?></span>

        <!-- EMAIL -->
        <label> E-mail </label>
        <input type="email" <?php if(!empty($errorEmail)) {echo "class='invalido'";} ?> <?php if (isset($_POST['email'])) {echo "value='".$_POST['email']."'";} ?> name="email" placeholder="email@email.com" required>
        <br><span class="erro"><?php echo $errorEmail ?></span>

        <!-- Password -->
        <label> Password </label>
        <input type="password" <?php if(!empty($errorPassword)) {echo "class='invalido'";} ?> <?php if (isset($_POST['password'])) {echo "value='".$_POST['password']."'";} ?> name="password" placeholder="Type your password" required>
        <br><span class="erro"><?php echo $errorPassword ?></span>

        <!-- Confirm Password-->
        <label> Confirm Password </label>
        <input type="password" <?php if(!empty($errorConfirmPassword)) {echo "class='invalido'";} ?> <?php if (isset($_POST['confirm_password'])) {echo "value='".$_POST['confirm_password']."'";} ?> name="confirm_password" placeholder="Confirm your password" required>
        <br><span class="erro"><?php echo $errorConfirmPassword ?></span>

        <button type="submit"> Send </button>

      </form>
    </main>
</body>
</html>