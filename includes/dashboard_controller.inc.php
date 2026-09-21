<?php
declare(strict_types=1);
 function is_empty(string $name, string $description,string $location,  string $date, string $status)
 {
    if(empty($name) || empty($description) || empty($location) || empty($date) || empty($status)){
        return true;
        }
    else{
        return false;
    }




 }
 function event_exist(object $pdo,string $name){
    if(getevent($pdo,$name)){
        return true;
    }
    return false;
 }
 function set_event(object $pdo,string $name, string $description,string $location,  string $date, string $status){
    insert_event($pdo, $name,  $description, $location,   $date,  $status);
 }
 function update_event(object $pdo,string $name,array $updates){
    update($pdo,$name,$updates);
 }
 function delete_event(object $pdo, int $id){
    delete($pdo,$id);
    
 }