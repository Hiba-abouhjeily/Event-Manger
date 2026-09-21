<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $eventId = intval($_GET['id']); // Sanitize input
    echo "Event ID: " . $eventId;
    try{
        require_once 'db.inc.php';
        require_once "dashboard_model.inc.php";
        require_once "dashboard_controller.inc.php";
    }
    catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    
    }
    delete_event($pdo, $eventId);
    header("Location: ../dashbaord.php?delete=success");
    $pdo=null;
    $stmt=null;
    die(); 

} else {
    echo "Invalid Event ID.";
}
?>