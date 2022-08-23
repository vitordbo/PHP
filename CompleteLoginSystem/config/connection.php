<?php
    session_start();
    /*
        could be local (localhost) or a real system (to really work )
        two modes
    */

    // To use PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

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

    function auth($tokenSession){
        global $pdo;
        // verfify if has authorization
        $sql = $pdo->prepare("SELECT * FROM users WHERE token=? LIMIT 1");
        $sql->execute(array($tokenSession)); // token that is save on the session
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        // if not find the user
        if(!$user){
            return false;
        }else{
            // if finds the user
            return $user;
        }
    }

?>