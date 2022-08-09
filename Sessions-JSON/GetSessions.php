<?php
    session_start();
    print_r($_SESSION);

    echo "<br>";
    // using the value of a session created in other file
    echo $_SESSION['name'];
?>