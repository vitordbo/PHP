<?php
    // some commonly used functions to manipulate strings

    echo "----------String length----------<br>";
    // strlen() - Return the Length of a String
    $frase = "Teste string length";
    echo strlen($frase);
    echo "<br>";
    echo strlen("Hello world!"); // outputs 12
 

    echo "<br>----------Word count----------<br>";
    // str_word_count() - Count Words in a String
    echo str_word_count("Hello world!"); // outputs 2
    echo "<br>";
    echo str_word_count("Hello user from gitHub!");

    
    echo "<br>----------Reverse a string----------<br>";
    // strrev() - Reverse a String
    echo strrev("Hello world!"); // outputs !dlrow olleH
    echo "<br>";
    echo strrev("Hello user from gitHub!");
    echo "<br>";

    echo "<br>----------Search for a text----------<br>";
    // strpos() - Search For a Text Within a String
    //strpos() searches for a specific text within a string 
    //If a match is found, the function returns the character position of the first match
    //If no match is found, it will return FALSE

    //Search for the text "world" in the string "Hello world!":
    echo strpos("Hello world!", "world"); // outputs 6
    echo "<br>";
    echo strpos("Hello user from gitHub!", "gitHub");


    echo "<br>----------Replace a text----------<br>";
    //str_replace() - Replace Text Within a String
    echo str_replace("world", "Vitor", "Hello world!"); // outputs Hello Vitor!
    echo "<br>";

    $data = "15-07-2022";
    echo "data before = " . $data . "<br>";
    
    echo "data after = ";
    echo str_replace("-", "/", $data);
    echo "<br>";

?>
