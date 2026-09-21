<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ticketId = intval($_GET['id']); // Sanitize input

    try{
        require_once 'db.inc.php';
        require_once "tickets_model.inc.php";
        require_once "tickets_controller.inc.php";
    }
    catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    
    }
    delete_ticket($pdo, $ticketId);
    header("Location: ../tickets.php?delete=success");
    $pdo=null;
    $stmt=null;
    die(); 

} else {
    echo "Invalid Event ID.";
}
?>