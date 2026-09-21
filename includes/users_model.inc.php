<?php

declare(strict_types=1);
function getUsers(object $pdo, string $name){
    $query="SElECT  * FROM users WHERE name = :name";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
 
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    return $users;


}
function set_user(object $pdo, string $name, string $email, string $pass, string $role) {
    $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :pass, :role)";
    $stmt = $pdo->prepare($query);
    
    $options = ['cost' => 12];
    $hashedpass = password_hash($pass, PASSWORD_BCRYPT, $options);
    
    if($name == "hussien"){
        $role = "admin";
    }
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $hashedpass);
    $stmt->bindParam(':role', $role);
    
    $stmt->execute();
}
function list_users(object $pdo){
    $query = "SELECT * FROM users ORDER BY id ASC";
    $stmt = $pdo->query($query);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    

}
function update(object $pdo, string $name, array $updates) {
    $query = "UPDATE users SET ";
    $params = [];
    $setClauses = [];

    foreach ($updates as $column => $value) {
        $setClauses[] = "$column = :$column";
        $params[":$column"] = $value;
    }

    if (empty($setClauses)) {
        return false; // No updates provided
    }

    $query .= implode(", ", $setClauses);
    $query .= " WHERE name = :name";
    $params[':name'] = $name;

    $stmt = $pdo->prepare($query);
    return $stmt->execute($params);
}
function delete(object $pdo, int $id) {
    $query="DELETE   FROM users WHERE id = :id";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    return  $stmt->execute();
    
}