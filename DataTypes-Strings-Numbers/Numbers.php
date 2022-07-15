<?php 
    //PHP Numbers
    // One thing to notice about PHP is that it provides automatic data type conversion.
    // So, if you assign an integer value to a variable, the type of that variable will 
    // automatically be an integer. 
    //Then, if you assign a string to the same variable, the type will change to a string.

    //This automatic conversion can sometimes break your code!!

    // it will add 
    $x = "150" + 50;
    var_dump($x);  // 200
    
    echo "<br>------------------------<br>";

    $value = 4 * 2.5; 
    var_dump($value); // the result it will be a float because of 2.5
    echo "<br>";
    var_dump(is_float($value)); // to test if $value is a float (true)

    echo "<br>------------------------<br>";
    // you can turn into a int 
    $intValue = (int) $value;
    var_dump($intValue);

    echo "<br>";
    // to test if is a int => return a boolean
    var_dump(is_int($intValue));

    echo "<br>------------------------<br>";
    // to test if is a number => return a boolean
    var_dump(is_numeric($intValue));


?>