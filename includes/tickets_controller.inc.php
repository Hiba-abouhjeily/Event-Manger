<?php
declare(strict_types=1);
function is_empty(string $Ename, string $seat, int $price, string $status) {
   if (empty($Ename) || empty($seat) || empty($price) || empty($status)) {
       return true;
   } else {
       return false;
   }
}
    function ticket_exist(object $pdo,string $Ename){
        if(  getTicekts($pdo,$Ename)){
            return true;
        }
        return false;
    }

 function set_tickets(object $pdo, string $Ename, string $seat, int $price, string $status){
    set_ticket( $pdo,  $Ename,  $seat, $price,  $status  );
 }
 function update_tickets(object $pdo,string $Ename,array $updates){
    update($pdo,$Ename,$updates);
 }
 function delete_ticket(object $pdo, int $id){
    delete($pdo,$id);
    
 }
 