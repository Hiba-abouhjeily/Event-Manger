<?php
//this file is for quering database
declare(strict_types=1);//this is for strict type checking ,security
function get_username(object $pdo,string $name){
    $quer="SELECT name FROM users WHERE name=:name";
    $stmt=$pdo->prepare($quer);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo,string $email){
    $quer="SELECT email FROM users WHERE email=:email";
    $stmt=$pdo->prepare($quer);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo, string $name, string $email, string $pass){
    $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :pass, :role)";
    $stmt = $pdo->prepare($query);
    
    $options = ['cost' => 12];
    $hashedpass = password_hash($pass, PASSWORD_BCRYPT, $options);
    
    // Determine role before binding
    $role = "admin";
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $hashedpass);
    $stmt->bindParam(':role', $role);
    
    $stmt->execute();
}

