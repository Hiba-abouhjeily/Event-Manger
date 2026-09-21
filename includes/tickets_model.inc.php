<?php

declare(strict_types=1);
function getTicekts(object $pdo, string $Ename){
    $query="SELECT * FROM tickets WHERE event_name = :Ename";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':Ename', $Ename);
    
    $stmt->execute();
 
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    return $users;


}

function set_ticket(object $pdo, string $Ename, string $seat, int $price, string $status) {
    try {
        $query = "INSERT INTO tickets (event_name, seat_number, price, status) 
                  VALUES (:event_name, :seat_number, :price, :status)";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':event_name', $Ename);
        $stmt->bindParam(':seat_number', $seat);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT); // Ensure integer type
        $stmt->bindParam(':status', $status);
        
        $stmt->execute();
        echo "Ticket added successfully!";
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}




function list_tickets(object $pdo){
    $query = "SELECT * FROM tickets ORDER BY ticket_id ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    

}
function update(object $pdo, string $Ename, array $updates) {
    if (empty($updates)) {
        return false; // No updates provided
    }

    $query = "UPDATE tickets SET ";
    $params = [];
    $setClauses = [];

    foreach ($updates as $column => $value) {
        $setClauses[] = "$column = :$column";
        $params[":$column"] = $value;
    }

    $query .= implode(", ", $setClauses);
    $query .= " WHERE event_name = :event_name";  // Fixed column name

    $params[':event_name'] = $Ename;  // Fixed parameter binding

    $stmt = $pdo->prepare($query);
    
    return $stmt->execute($params);
}

function delete(object $pdo, int $id) {
    $query="DELETE   FROM tickets WHERE ticket_id = :id";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    return  $stmt->execute();
    
}