<?php
    // Variables => case sensitive

    //we don't have to tell PHP which data type the variable is but in PHP 7, type declarations were added. 

    // use $ and the name  
    $color = "red";  // declaration
    $COLOR = "blue"; // another variable


    echo $color;
    echo "<br>";
    echo $COLOR;

    echo "<br>";
    // visible or not visible in a function?
    $x = 10;
    $y = 5;

    function teste()
    {
        # echo "x value = $x"; => it won't work because x is not initialized inside the function

        // to use a outside variable in a function => ( global )
        global $x;  // same x in line 16
        echo "x value inside the function = $x"; // now is going to work 
    }

    teste();
    echo "<br>";
    echo "x value outside the function= $x";
    echo "<br>";

    // put 2 variable together => use a .
    $name = "Vitor";
    echo "My name is " . $name . "!";  

?>