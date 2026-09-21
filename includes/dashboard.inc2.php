<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST["name"];
    $updates=[];
   
    if (!empty($_POST['description'])) {
        $updates['description'] = $_POST['description'];
    }
    if (!empty($_POST['location'])) {
        $updates['location'] = $_POST['location'];
    }
    if (!empty($_POST['date'])) {
        $updates['date'] = $_POST['date'];
    }
    if (!empty($_POST['status'])) {
        $updates['status'] = $_POST['status'];
    }
    try{
        require_once 'db.inc.php';
        require_once "dashboard_model.inc.php";
        require_once "dashboard_controller.inc.php";
        //error handeling
        $errors=[];
        
        if(!event_exist($pdo,$name)){
            $errors['not found']="event  doesnot exist";
        }
        require_once "session_config.php";
        if($errors){
            $_SESSION['errors']=$errors;
            header("Location: ../dashboard.php");
            die();
        }
        update_event($pdo, $name, $updates);
        header("Location: ../dashbaord.php?updater=success");
        $pdo=null;
        $stmt=null;
        die();  




    }   
    catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    
    }

}
else{
    header("Location: ../dashbaord.php");
    die();
}
