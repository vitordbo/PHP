<?php 
    // PHP Functions
    // The real power of PHP comes from its functions.

    // PHP has more than 1000 built-in functions, and in addition you can create your own custom functions.


    echo "----- User Defined Functions -----<br>";
    // PHP User Defined Functions
    // Besides the built-in PHP functions, it is possible to create your own functions.

    // A function is a block of statements that can be used repeatedly in a program.
    // A function will not execute automatically when a page loads.
    // A function will be executed by a call to the function.

    // Syntax =>  Function names are NOT case-sensitive.
    // function functionName() {
    //   code to be executed;
    // }

    function writeMsg() {
        echo "Hello world!";
        echo "<br>";
    }
      
    writeMsg(); // call the function


    // PHP Function Arguments
    echo "<br>----- Function with Arguments -----<br>";
    // Information can be passed to functions through arguments. 
    // An argument is just like a variable.
    //Arguments are specified after the function name, inside the parentheses. You can add as many arguments as you want, 
    //just separate them with a comma.

    //function with just one argument
    function GoodMorning($name) {
        echo "Good Morning, $name .<br>";
    }
      
    GoodMorning("Vitor");
    GoodMorning("Pedro");
    GoodMorning("Amanda");


    echo "<br>----- Function with 2 Arguments -----<br>";
    // function with two arguments
    function NameColor($name, $color) {
        echo "Hello, $name. Your favorite color is $color <br>";
    }
      
    NameColor("Vitor", "blue");
    NameColor("Pedro", "red");
    NameColor("Amanda", "black");

        
    // PHP is a Loosely Typed Language
    echo "<br>----- Function with data type -----<br>";
    // In the example above, notice that we did not have to tell PHP which data type the variable is.

    // PHP automatically associates a data type to the variable, depending on its value. 
    //Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.
    // In PHP 7, type declarations were added. This gives us an option to specify the expected data type when declaring a function, 
    //and by adding the strict declaration, it will throw a "Fatal Error" if the data type mismatches.

    // In the following example we try to send both a number and a string to the function without using strict:

    // function addNumbers(int $a, int $b) {
    //     return $a + $b;
    // }

    function addNumbers($a, $b) {
        return $a + $b;
    }

    echo addNumbers(10, 5);
    echo "<br>";

    
    // echo addNumbers(5, "5 days"); // since strict is NOT enabled "5 days" is changed to int(5), and it will return 10
    // The strict declaration forces things to be used in the intended way.

    // To specify strict we need to set declare(strict_types=1);. This must be on the very first line of the PHP file.

    // In the following example we try to send both a number and a string to the function, but here we have added the strict declaration:
    // <?php declare(strict_types=1); // strict requirement
    // function addNumbers(int $a, int $b) {
    // return $a + $b;
    // }
    // echo addNumbers(5, "5 days");
    // // since strict is enabled and "5 days" is not an integer, an error will be thrown


    //PHP Default Argument Value
    echo "<br>----- Function with Default Argument -----<br>";
    // The following example shows how to use a default parameter. If we call the function setHeight() without arguments it takes the default value as argument:
   
    function setAge($minAge= 15) {
      echo "The age is : $minAge <br>";
    }
    
    setAge(35);
    setAge(); // will use the default value of 50
    setAge(60); 
    echo "<br>";

    //     PHP Functions - Returning values
    echo "<br>----- Function Returning values -----<br>";
    // To let a function return a value, use the return statement:

    function sum($x, $y) {
        $z = $x + $y;
        return $z;
    }

    echo "5 + 10 = " . sum(5, 10) . "<br>";
    echo "7 + 13 = " . sum(7, 13) . "<br>";
    echo "520 + 4 = " . sum(520, 4) . "<br>";


    // PHP Return Type Declarations
    // PHP 7 also supports Type Declarations for the return statement. Like with the type declaration for function arguments, by enabling the strict requirement, it will throw a "Fatal Error" on a type mismatch.

    // To declare a type for the function return, add a colon ( : ) and the type right before the opening curly ( { )bracket when declaring the function.

    // In the following example we specify the return type for the function:

    // <?php declare(strict_types=1); // strict requirement
    // function addNumbers(float $a, float $b) : float {
    // return $a + $b;
    // }
    // echo addNumbers(1.2, 5.2);


    // Passing Arguments by Reference
    echo "<br>----- Function Passing Arguments by Reference -----<br>";
    // In PHP, arguments are usually passed by value, which means that a copy of the value is used in the function and the variable that was passed into the function cannot be changed.

    // When a function argument is passed by reference, changes to the argument also change the variable that was passed in. 
    //To turn a function argument into a reference, the & operator is used:
    function add_five(&$value) {
        $value += 5;
    }

    $num = 2;
    add_five($num);
    echo $num;
  
?>