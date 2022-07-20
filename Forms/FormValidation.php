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
        <input type="text" name="nome" placeholder="Type your full name">
        <br><span class="error"></span>

        <!-- EMAIL -->
        <label> E-mail </label>
        <input type="email" name="email" placeholder="email@email.com">
        <br><span class="error"></span>

        <!-- SENHA -->
        <label> Password </label>
        <input type="password" name="senha" placeholder="Type your password">
        <br><span class="error"></span>

        <!-- REPETE SENHA -->
        <label> Confirm Password </label>
        <input type="password" name="repete_senha" placeholder="Confirm your password">
        <br><span class="error"></span>

        <button type="submit"> Send </button>

      </form>
    </main>
</body>
</html>