<?php
declare(strict_types=1);
function get_user(object $pdo, string $name, string $pass) {
    // Query to retrieve the user by name
    $query = "SELECT * FROM users WHERE name = :name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If a user is found
    if ($user) {
        // For regular users, verify the password using password_verify
        if (password_verify($pass, $user['password'])) {
            return $user; // Return the user if password is correct
        }
    }
    
    return false; // Return false if no match found or password is incorrect
}

