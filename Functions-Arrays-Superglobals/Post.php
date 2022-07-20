<?php
    // PHP $_POST
    // PHP $_POST is a PHP super global variable which is used to collect 
    //form data after submitting an HTML form with method="post". $_POST is also widely used to pass variables.

?>

<html> <!-- Making dynamic content with post => not visible in the url  -->
    <body>
        <h1>PHP Post</h1>
        <hr>
        <br>
      
        <!-- Forms with post -->
        <form method="POST" action="ReceivePost.php">  
            <input type="text" name="name" placeholder="type your name"><br>
            <br>
            <input type="text" name="age" placeholder="type your age"><br>
            <button type="submit"> Send</button><br>
        </form>
        
    </body>
</html>