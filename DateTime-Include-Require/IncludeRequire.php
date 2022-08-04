<?php 

    //The include (or require) statement takes all the text/code/markup that exists in the specified file 
    //and copies it into the file that uses the include statement.

    //Including files is very useful when you want to include the same PHP, HTML, or text on 
    //multiple pages of a website.

    // like a script tag in html => insert a js file

    //will only produce a warning and the script will continue
    include('TestInclude.php');  // text from other file 
    // could use include_once => to only use once another file 

    // almost the same => but is a necessity to the code run =>will produce a fatal error and stop the script
    require('TestInclude.php'); 
?>