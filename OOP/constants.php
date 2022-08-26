<?php

    //Constants =>
    //Constants cannot be changed once it is declared.

    //Class constants can be useful if you need to define some constant data within a class.

    //A class constant is declared inside a class with the const keyword.

    //Class constants are case-sensitive. However, it is recommended to name the constants 
    //in all uppercase letters.

    //We can access a constant from outside the class by using the class name followed by 
    //the scope resolution operator (::) followed by the constant name, like here:

    class Hello {
        const LEAVING_MESSAGE = "Hello, how are you?";

        function constant(){
            echo self::LEAVING_MESSAGE;
        }
    }
      
    echo Hello::LEAVING_MESSAGE;
    echo "<br>";

    // to show a const using a method 
    $obj1 = new Hello();
    $obj1->constant();


?>