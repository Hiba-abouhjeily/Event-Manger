<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = $_POST['name'];
$email = $_POST['email'];
$pass= $_POST['password'];
try{//ot must be in the exact order bellow
    require_once 'db.inc.php';
    require_once 'register_model.inc.php';
    require_once 'register_controller.inc.php';
    $errors=[];
    //Error handler
    if(is_empty($name, $email, $pass)){
        $errors['empty']="All fields are required";
    }
    if(is_email_invalid($email)){
        $errors['invalid']="Email is invalid";
    }
    if (is_user_taken(  $pdo,$name)){
        $errors['taken']="Username is taken";
    }
    if(is_email_registerd($pdo, $email)){
        $errors['email_taken']="Email is taken";
    }
    require_once 'session_config.php';
    if($errors){
        $_SESSION['errors']=$errors;
        header("Location: ../register.php");
        die();
    }
     create_user($pdo, $name, $email, $pass);
     
    header("Location: ../login.php?signup=success");
    $pdo=null;
    $stmt=null;
    die();
}
catch(PDOException $e){
    die("Query failed: ".$e->getMessage());

}
}
else{
    header("Location: ../register.php");
    die();

}
    