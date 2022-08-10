<?php
    session_start();

    // use this values in other file 
    $_SESSION["name"] = "Vitor";
    $_SESSION["sport"] = "Soccer";
    
    //Sessions

    //A session is a way to store information (in variables) to be used across multiple pages.
    //Unlike a cookie, the information is not stored on the users computer.
    
    //stores user information to be used across multiple pages (e.g. username, favorite color, etc). 
    //By default, session variables last until the user closes the browser.
    //So Session variables hold information about one single user, and are available 
    //to all pages in one application.

    // start a session => under <?php => first line 
    // session_start()

    // create and modify 
    // $_SESSION["name"] = "Vitor";

    // remove all variables 
    //session_unset();

    //destroy the session   
    //session_destroy();

?>