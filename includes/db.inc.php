<?php

$host="localhost";
$dbname="php_project";
$dbusername="root";
$dbpassword="";

try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e){

    die("Connection failed: ".$e->getMessage());    

}
