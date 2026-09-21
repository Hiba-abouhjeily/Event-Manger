<?php
//this file is for dealing with user imput
declare(strict_types=1);
function is_empty(string $name,  string $email,string  $pass){
    if(empty($name) || empty($email) || empty($pass)){
        return true;
    }
    else{
        return false;
    }
}
function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}
function is_user_taken( object $pdo,string $name){
    if( get_username( $pdo, $name)){
        return true;
    }
    else{
        return false;
    }

}
function is_email_registerd(object $pdo,string $email){
    if(get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
   
}
function create_user(object $pdo, string $name, string $email, string $pass){
    set_user($pdo, $name, $email, $pass);
}