<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST["name"];
    $description=$_POST["description"];
    $location=$_POST["location"];
    $date=$_POST["date"];
    $status=$_POST["status"];
    try{
        require_once 'db.inc.php';
        require_once "dashboard_model.inc.php";
        require_once "dashboard_controller.inc.php";
        //error handeling
        $errors=[];
        if(is_empty($name,$description,$location,$date,$status)){
            $errors['empty']="All fields are required";
        }
        if(event_exist($pdo,$name)){
            $errors['taken']="Eevet already exist!";
        }
        require_once "session_config.php";
        if($errors){
            $_SESSION['errors']=$errors;
            header("Location: ../dashbaord.php");
            die();
        }

        set_event( $pdo, $name,  $description, $location,   $date,  $status);
        header("Location: ../dashbaord.php?enter=success");
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
