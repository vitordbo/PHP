<?php
    // PHP Loops
    // Often when you write code, you want the same block of code to run over and over again a certain number of times. 
    // Loops are used to execute the same block of code again and again, as long as a certain condition is true.

    // In PHP, we have the following loop types:

    // while - loops through a block of code as long as the specified condition is true
    // do...while - loops through a block of code once, and then repeats the loop as long as the specified condition is true
    // for and foreach (next file)

    echo "----- While -----<br>";
    // while (condition is true) {
    // code to be executed;
    // }
    
    // The example below displays the numbers from 1 to 5:
    $x = 1;

    while($x <= 5) {
        echo "The number is: $x <br>";
        $x++;
    }

    echo "<br>----- Do While -----<br>";
    // do {
    //   code to be executed;
    // } while (condition is true);
    
    // The example below first sets a variable $x to 1 ($x = 1). 
    // Then, the do while loop will write some output, and then increment the variable $x with 1. Then the 
    // condition is checked (is $x less than, or equal to 5?), 
    // and the loop will continue to run as long as $x is less than, or equal to 5:
    $x = 1;
    
    do {
        echo "The number is: $x <br>";
        $x++;
     } while ($x <= 5);
  
?>