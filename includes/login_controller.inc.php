<?php
declare(strict_types=1);
function is_empty(string $name, string  $pass){
    if(empty($name) || empty($pass)){
        return true;
    }
    else{
        return false;
    }
}


function is_user_exists(object $pdo, string $name,string $pass){
    if (get_user($pdo, $name, $pass)) {
        return false; // User exists
    } else {
        return true; // User doesn't exist or password is incorrect
    
}
}
function login_user(object $pdo, string $name, string $pass){
    
  $user=get_user( $pdo, $name,$pass);
  if($user['role'] == 'admin'){
      header("Location: ../dashbaord.php?login=success");
  }
  else{
      header("Location: ../main.php?login=success");
  }

}

