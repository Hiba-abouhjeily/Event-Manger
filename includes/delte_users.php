<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']); // Sanitize input
    echo "USER ID: " . $userId;
    try{
        require_once 'db.inc.php';
        require_once "users_model.inc.php";
        require_once "users_controller.inc.php";
    }
    catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    
    }
    delete_users( $pdo, $userId);
    header("Location: ../users.php?delete=success");
    $pdo=null;
    $stmt=null;
    die(); 

} else {
    echo "Invalid Event ID.";
}
?>