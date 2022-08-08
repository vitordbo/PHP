<?php

    //What is a Cookie?
    //A cookie is often used to identify a user. A cookie is a small file that 
    //the server embeds on the user's computer. Each time the same computer requests a 
    //page with a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values.

    //A cookie is created with the setcookie() function.
    //setcookie(name, value, expire, path, domain, secure, httponly);
    //Only the name parameter is required. All other parameters are optional.

    // get value from cookie 
    // $_COOKIE ['name'];

    // cookie to save a name 
    // pass a negative value on time to delete the cookie 
    setcookie('name', 'Vitor', time()+(86400 * 30)); // one day * 30 => cookie for 30 days

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cookies</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1> Cookies 🍪 </h1>

        <!-- if exists a cookie with this name -->
        <?php 
            if (isset($_COOKIE['name'])){
                $name = $_COOKIE['name'];
                echo "the name is $name";
            } else {
                echo "no cookies";
            }

            // to see if there is a cookie 
            if (count($_COOKIE) > 0 ){
                echo "there is a cookie";
            } else {
                echo "there is not a cookie";
            }
        ?>
    </body>
</html>