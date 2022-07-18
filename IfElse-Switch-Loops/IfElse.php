<?php 
    // PHP Conditional Statements
    // if statement - executes some code if one condition is true
    // if...else statement - executes some code if a condition is true and another code if that condition is false
    // if...elseif...else statement - executes different codes for more than two conditions

    //PHP - The if Statement executes some code if one condition is true.
    //Output "Have a good day!" if the current time (HOUR) is less than 20:
    $t = date("H");
    if ($t < "20") {
    echo "Have a good day!";
    echo "<br>";
    }


    // PHP - The if...else Statement executes some code if a condition is true and another code if that condition is false.
    // Output "Have a good day!" if the current time is less than 20, and "Have a good night!" otherwise:

    $h = date("H");
    if ($h < "20") {
       echo "Have a good day!";
       echo "<br>";
    } else {
       echo "Have a good night!";
       echo "<br>";
    }


    //     PHP - The if...elseif...else Statement executes different codes for more than two conditions.
    // Output "Have a good morning!" if the current time is less than 10, 
    //and "Have a good day!" if the current time is less than 20. Otherwise it will output "Have a good night!":
   
    $t = date("H");

    if ($t < "10") {
      echo "Have a good morning!";
    } elseif ($t < "20") {
       echo "Have a good day!";
    } else {
      echo "Have a good night!";
    }

?>