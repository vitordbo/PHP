<?php
    //PHP has a set of math functions that allows you to perform mathematical tasks on numbers.

    echo "-------------pi-------------<br>";
    //PHP pi() Function returns the value of PI:
    echo(pi()); // returns 3.1415926535898
    echo "<br>";

    echo "<br>-------min and max------<br>";
    // PHP min() and max() Functions can be used to find the lowest or highest value in a list of arguments
    $numbers = [1,10, 50, 258, 654, -69, -256];
    echo min($numbers);  // returns -256
    echo "<br>";
    echo max($numbers);  // returns 654


    echo "<br>-------abs------<br>";
    //PHP abs() Function returns the absolute (positive) value of a number:
    echo(abs(-6.7));  // returns 6.7
    echo "<br>";


    echo "<br>-------sqrt------<br>";
    //PHP sqrt() Function returns the square root of a number:
    echo(sqrt(64));  // returns 8
    echo "<br>";


    echo "<br>-------round------<br>";
    //PHP round() Function rounds a floating-point number to its nearest integer:
    echo(round(0.70));  // returns 1
    echo "<br>";
    echo(round(0.49));  // returns 0
    echo "<br>";

    echo "<br>-------rand-----<br>";
    //The rand() function generates a random number:
    echo(rand());
    echo "<br>";

    echo "<br>-------rand with intervals-----<br>";
    //To get more control over the random number, you can add the optional min and max parameters to s
    //pecify the lowest integer and the highest integer to be returned.
    //For example, if you want a random integer between 10 and 1000 (inclusive), use rand(10, 1000):
    echo(rand(10, 1000));






?>