<?php

  // general configurations
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "YT_course";

  // try to connect => showing error mesage 
  try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>