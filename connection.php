<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "trinitas";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

} catch(PDOException $e) {
    echo "Connection Failed: " .$e->getMessage();
}

?>