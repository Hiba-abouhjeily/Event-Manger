<?php
declare(strict_types=1);
function is_empty(string $name, string $email, string $pass, string $role) {
   if (empty($name) || empty($email) || empty($pass) || empty($role)) {
       return true;
   } else {
       return false;
   }
}

 function user_exist(object $pdo,string $name){
    if( getUsers($pdo,$name)){
        return true;
    }
    return false;
 }
 function set_users(object $pdo,string $name, string $email, string $pass, string $role){
    set_user( $pdo,  $name, $email,  $pass,  $role);
 }
 function update_users(object $pdo,string $name,array $updates){
    update($pdo,$name,$updates);
 }

 function delete_users(object $pdo, int $id){
    delete($pdo,$id);
    
 }