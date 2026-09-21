<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass= $_POST['password'];
    $role= $_POST['role'];
    try{
        require_once 'db.inc.php';
        require_once "users_model.inc.php";
        require_once "users_controller.inc.php";
        //error handeling
        $errors=[];
        if(is_empty(  $name,  $email,  $pass,  $role)){
            $errors['empty']="All fields are required";
        }
        if(user_exist($pdo,$name)){
            $errors['taken']="Username is taken";
        }
        require_once "session_config.php";
        if($errors){
            $_SESSION['errors']=$errors;
            header("Location: ../users.php");
            die();
        }
        set_users( $pdo, $name,  $email,  $pass,  $role);
    
        header("Location: ../users.php?enter=success");
        $pdo=null;
        $stmt=null;
        die();  




    }   
    catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    
    }

}
else{
    header("Location: ../users.php");
    die();
}
