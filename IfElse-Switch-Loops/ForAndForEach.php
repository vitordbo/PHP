<?php
    // PHP Loops
    // Often when you write code, you want the same block of code to run over and over again a certain number of times.
    // Loops are used to execute the same block of code again and again, as long as a certain condition is true.

    // In PHP, we have the following loop types:
    // while and do...while (past file)
    // for - loops through a block of code a specified number of times
    // foreach - loops through a block of code for each element in an array

    echo "----- For -----<br>";
    // for (init counter; test counter; increment counter) {
    // code to be executed for each iteration;
    // }

    // Example
    // The example below displays the numbers from 0 to 10:
    for ($x = 0; $x <= 10; $x++) {
        echo "The number is: $x <br>";
    }


    echo "----- foreach -----<br>";
    // The foreach loop works only on arrays, and is used to loop through each key/value pair in an array.
    // foreach ($array as $value) {
    // code to be executed;
    // }
    
    // For every loop iteration, the value of the current array element is assigned to $value and the 
    //array pointer is moved by one, until it reaches the last array element.

    // The following example will output the values of the given array ($colors):
    $colors = array("red", "green", "blue", "yellow");

    foreach ($colors as $value) {
        echo "$value <br>";
    }
  
?>