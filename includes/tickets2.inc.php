<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Ename=$_POST["event_name"];
    $updates=[];
   
    if (!empty($_POST['seat_number'])) {
        $updates['seat_number'] = $_POST['seat_number'];
    }
    if (!empty($_POST['price'])) {
        $updates['price'] = $_POST['price'];
    }
    if (!empty($_POST['status'])) {
        $updates['status'] = $_POST['status'];
    }
   
    try{
        require_once 'db.inc.php';
        require_once "tickets_model.inc.php";
        require_once "tickets_controller.inc.php";
        //error handeling
        $errors=[];
        
        if (!ticket_exist($pdo, $Ename)) {
            $errors['taken'] = "Event not found";
        }
        require_once "session_config.php";
        if($errors){
            $_SESSION['errors']=$errors;
            header("Location: ../tickets.php");
            die();
        }
        update_tickets($pdo, $Ename, $updates);
        header("Location: ../tickets.php?updater=success");
        $pdo=null;
        $stmt=null;
        die();  




    }   
    catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    
    }

}
else{
    header("Location: ../tickets.php");
    die();
}
