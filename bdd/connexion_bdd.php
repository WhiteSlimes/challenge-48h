<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "db5000455942.hosting-data.io";
$username = "dbu771368";
$password = "Challenge123!";

try {
    $bd = new PDO("mysql:host=$servername;dbname=dbs436642", $username, $password);
    // set the PDO error mode to exception
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>