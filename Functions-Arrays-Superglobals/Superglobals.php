<?php
    // PHP Global Variables - Superglobals
    // Superglobals were introduced in PHP 4.1.0, and are built-in variables that are always available in all scopes.

    // PHP Global Variables - Superglobals
    // Some predefined variables in PHP are "superglobals", which means that they are always accessible, 
    // regardless of scope - and you can access them from any function, class or file without having to do anything special.

    // The PHP superglobal variables are:

    // $GLOBALS
    // $_SERVER
    // $_REQUEST
    // $_POST
    // $_GET
    // $_FILES
    // $_ENV
    // $_COOKIE
    // $_SESSION

    echo "----------<br>";
    // $GLOBALS is a PHP super global variable which is used to access global variables 
    //from anywhere in the PHP script (also from within functions or methods).

    // PHP stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable.
    // The example below shows how to use the super global variable $GLOBALS:

    $x = 75;
    $y = 25;
    
    function addition() {
        $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    
    addition();
    echo $z;  // In the example above, since z is a variable present within the $GLOBALS array, it is also accessible from outside the function!
    echo "<br>----------<br>";   

    // PHP $_SERVER is a super global variable which holds information about headers, paths, and script locations.

    // The example below shows how to use some of the elements in $_SERVER:
    
    echo $_SERVER['SERVER_PROTOCOL']; // 	Returns the name and revision of the information protocol
    echo "<br>";
    echo $_SERVER['PHP_SELF']; // Returns the filename of the currently executing script
    echo "<br>";
    echo $_SERVER['SERVER_NAME']; //Returns the name of the host server 
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];  // Returns the Host header from the current request
    echo "<br>----------<br>";   

    // everything in this superglobal => 
    foreach ($_SERVER as $key => $value){
        echo "<strong>$key</strong> : $value <br>";
    }
          
?>