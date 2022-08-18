<?php

    /*
        could be local (localhost) or a real system (to really work )
        two modes
    */

    $mode = 'local';

    if ($mode == 'local'){
        // general configurations
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "login_system";
    }

    if ($mode == 'real'){
        // general configurations
        $servername = "";
        $username = "";
        $password = "";
        $dbName = "";
    }

    // try to connect => showing error mesage 
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    
    // function to prevent wrong data
    function cleanPost($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>