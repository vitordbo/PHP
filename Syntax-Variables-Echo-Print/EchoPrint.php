<?php

    // echo and print 
    //The differences are small: echo has no return value while print has a return value of 1. 
    //echo can take multiple parameters (although such usage is rare) while print can take one argument. 
    //echo is marginally faster than print.

    echo "<h1>PHP</h1>";
    echo "Hello world!<br>";
    echo "This ", "is ", "echo ", "using ", "multiple parameters";

    print "<h1>PHP</h1>";
    print "Hello world!<br>";
    print "My name is " . "Vitor";

?>