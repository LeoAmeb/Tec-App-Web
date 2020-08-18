<?php

$host = "ameb.tech";
$username = "revoluxionAdmin";
$password = "revoluxionPass"; //cambia dependiedo de la contraseña del root
$dbname = "revoluxion_DB";

try{
    $dsn = "mysql:host=$host;dbname=$dbname";
    $conn = new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die($e->getMessage());
}
?>