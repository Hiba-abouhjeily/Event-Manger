<?php
require_once "includes/db.inc.php";
require_once 'includes/session_config.php';
require_once "includes/dashboard_model.inc.php";
require_once 'includes/dashboard_view.inc.php';
$events = list_event($pdo);
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
            <li><a href="#">Manage Events</a></li>
            <li><a href="users.php">Manage Users</a></li>
            <li><a href="tickets.php">Manage Tickets</a><li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
    <h1>Events List</h1>
        <table class="center-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['id']) ?></td>
                        <td><?= htmlspecialchars($event['name']) ?></td>
                        <td><?= htmlspecialchars($event['date']) ?></td>
                        <td><?= htmlspecialchars($event['description']) ?></td>
                        <td><?= htmlspecialchars($event['location']) ?></td>
                        <td><?= htmlspecialchars($event['status']) ?></td>
                        <td>
                            <a href="includes/delete_event.php?id=<?= $event['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this event?');"><i class="fas fa-trash"></i></a>
                    
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No events found.</td></tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- Floating Add Event Button -->
    <button class="add-event-btn" onclick="document.getElementById('addEventForm').style.display='block'">+</button>
    
    <!-- Floating Edit Event Button -->
    <button class="edit-event-btn" onclick="document.getElementById('editEventForm').style.display='block'">✎</button>

    <!-- Event Creation Form -->
    <div id="addEventForm" class="modal">
        <form action="includes/dashboard.inc.php" method="post">
            <input type="text" name="name" placeholder="Event Name">
            <textarea placeholder="Event Description" name="description"></textarea>
            <input type="text" placeholder="Event Location" name="location">
            <input type="date" name="date">
            <label for="status">Choose Status:</label>
            <select name="status" id="status">
                <option value="Upcoming" selected>Upcoming</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
            <button type="submit">Add Event</button>
            <button type="button" onclick="document.getElementById('addEventForm').style.display='none'">Cancel</button>
        </form>
    </div>

    <!-- Event Editing Form -->
    <div id="editEventForm" class="modal">
        <form action="includes/dashboard.inc2.php" method="post">
            <input type="text" name="name" placeholder="Event Name">
            <textarea placeholder="Event Description" name="description"></textarea>
            <input type="text" placeholder="Event Location" name="location">
            <input type="date" name="date">
            <label for="status">Choose Status:</label>
            <select name="status" id="status">
                <option value="Upcoming" selected>Upcoming</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
            <button type="submit">Update Event</button>
            <button type="button" onclick="document.getElementById('editEventForm').style.display='none'">Cancel</button>
        </form>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    let toast = document.getElementById("toast-message");
    if (toast) {
        setTimeout(() => {
            toast.style.opacity = "0";
        }, 3000); // Hide after 3 seconds
    }
});
</script>

    <?php
           check_signup_errors();
           ?>

</body>
</html> 