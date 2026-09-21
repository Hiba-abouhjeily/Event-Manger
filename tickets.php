<?php
require_once "includes/db.inc.php";
require_once 'includes/session_config.php';
require_once "includes/tickets_model.inc.php";
require_once 'includes/tickets_view.inc.php';
$tickets = list_tickets($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styledash.css">
    </head>
</head>
<body>

   <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
   
        <ul>
            <li><a href="#"> Manage Ticket</a></li>
            <li><a href="dashbaord.php">Manage Events</a></li>
            <li><a href="users.php">Manage Users</a><li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
    <h1>Ticekt Lists</h1>
        <table class="center-table">
            <tr>
                <th>Actions</th>
                <th> Event Name</th>
                <th>Number of Seats</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>

                
            </tr>

            <?php if (!empty($tickets)): ?>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= htmlspecialchars($ticket['ticket_id']) ?></td>
                        <td><?= htmlspecialchars($ticket['event_name']) ?></td>
                        <td><?= htmlspecialchars($ticket['seat_number']) ?></td>
                        <td><?= htmlspecialchars($ticket['price']) ?></td>
                       
                        <td><?= htmlspecialchars($ticket['status']) ?></td>
                        <td>
                            <a href="includes/delete_tickets.php?id=<?= $ticket['ticket_id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this event?');"><i class="fas fa-trash"></i></a>
                    
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No tickets found.</td></tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- Floating Add Event Button -->
    <button class="add-event-btn" onclick="document.getElementById('addEventForm').style.display='block'">+</button>
    
    <!-- Floating Edit Event Button -->
    <button class="edit-event-btn" onclick="document.getElementById('editEventForm').style.display='block'">✎</button>

    <!-- Event Creation Form -->
    <div id="addEventForm" class="modal">
        <form action="includes/tickets.inc.php" method="post">
            <input type="text" name="event_name" placeholder="Event Name" >
            <input type="text" placeholder="Seat_Number" name="seat_number"></textarea>
            <input type=number placeholder="price" name="price">
          
            <label for="status">Choose Status:</label>
            <select name="status" id="status">
                <option value="pending" selected>Upcoming</option>
                <option value="confirmed">Confrimed</option>
              
                <option value="Cancelled">Cancelled</option>
            </select>
            <button type="submit">Add Tickets</button>
            <button type="button" onclick="document.getElementById('addEventForm').style.display='none'">Cancel</button>
        </form>
    </div>

    <!-- Event Editing Form -->
    <div id="editEventForm" class="modal">
        <form action="includes/tickets2.inc.php" method="post">
        <input type="text" name="event_name" placeholder="Event Name" >
            <input type="text" placeholder="Seat_Number" name="seat_number"></textarea>
            <input type=number placeholder="price" name="price">
          
            <label for="status">Choose Status:</label>
            <select name="status" id="status">
                <option value="pending" selected>Upcoming</option>
                <option value="confirmed">Confrimed</option>
              
                <option value="Cancelled">Cancelled</option>
            </select>
            <button type="submit">Update Tickets</button>
            <button type="button" onclick="document.getElementById('editEventForm').style.display='none'">Cancel</button>
        </form>
    </div>

    <?php
    
   check_signup_errors();
   ?>
</body>
</html> 