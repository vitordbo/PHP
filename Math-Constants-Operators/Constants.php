<?php 

    //PHP Constants
    //Constants are like variables except that once they are defined they cannot be changed or undefined.
    //A valid constant name starts with a letter or underscore (no $ sign before the constant name).

    //To create a constant, use the define() function.
    //define(name, value)
    //name: Specifies the name of the constant
    //value: Specifies the value of the constant
    //constants are case-sensitive
    
    echo "-------Constants-----<br>";
    define("name", "Vitor Duarte");
    echo name; // Vitor Duarte
    echo "<br>";

    define("money", 987654321);
    echo money; // 987654321
    echo "<br>";
    

    echo "<br>-------Using function-----<br>";
    //constants are automatically global across the entire script.
    function test () {
        echo name;
        echo "<br>";
        echo money;
    }  
   
    test();

?>