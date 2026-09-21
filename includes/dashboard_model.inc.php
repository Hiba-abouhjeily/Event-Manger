<?php
    declare(strict_types=1);
    function getEvent(object $pdo, string $name){
        $query="SElECT  * FROM events WHERE name = :name";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
     
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event;


    }
    function insert_event(object $pdo,string $name, string $description,string $location,  string $date, string $status){
        $query="INSERT INTO events (name, description, location, date,status) VALUES (:name, :description, :location, :date,:status)";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

    } 
        
    function list_event(object $pdo){
        $query = "SELECT * FROM events ORDER BY date ASC";
        $stmt = $pdo->query($query);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        

    }
    function update(object $pdo, string $name, array $updates) {
        $query = "UPDATE events SET ";
        $params = [];
        $setClauses = [];
    
        foreach ($updates as $column => $value) {
            $setClauses[] = "$column = :$column";
            $params[":$column"] = $value;
        }
    
        if (empty($setClauses)) {
            return false; // No updates provided
        }
    
        $query .= implode(", ", $setClauses);
        $query .= " WHERE name = :name";
        $params[':name'] = $name;
    
        $stmt = $pdo->prepare($query);
        return $stmt->execute($params);
    }
    function delete(object $pdo, int $id) {
        $query="DELETE   FROM events WHERE id = :id";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        return  $stmt->execute();
        
    }