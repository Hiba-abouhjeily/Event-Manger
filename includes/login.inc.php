<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name=$_POST['name'];
        $pass=$_POST['password'];
        try{
            require_once 'db.inc.php';
            require_once 'login_model.inc.php';
            require_once 'login_controller.inc.php';
            $errors=[];
            //Error handler
            if(is_empty($name, $pass)){
                $errors['empty']="All fields are required";
            }
            if(is_user_exists($pdo, $name, $pass)){
                $errors['invalid']="Invalid username or password";
            }
            require_once 'session_config.php';

            if($errors){
                $_SESSION['errors']=$errors;
                header("Location: ../login.php");
                die();

            }
            login_user($pdo, $name, $pass);
      
            $pdo=null;
            $stmt=null;
            die();


        }
        catch(PDOException $e){
            die("Query failed: ".$e->getMessage());
        
        }

    }
    else{
        header('Location: ../login.php');
        die();
    }