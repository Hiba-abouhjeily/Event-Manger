<?php 
require_once "includes/db.inc.php";
require_once 'includes/session_config.php';
require_once "includes/users_model.inc.php";
require_once 'includes/users_view.inc.php';
$users = list_users($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet"href="styleuser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#">Manage Users</a></li>
            <li><a href="dashbaord.php">Manage Events</a></li>
            <li><a href="tickets.php">Manage Tickets</a></li>
            <li><a href="login.php">Logout</a></li>
     </ul>
    </div>

    <!-- Main Content -->
   <div class="main-content">
       <h2>Users List</h2>
       <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
              
                <th>Actions</th>
            </tr>

            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['password']) ?></td>

                        <td><?= htmlspecialchars($user['role']) ?></td>
                 
                        <td>
                            <a href="includes/delte_users.php?id=<?= $user['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this event?');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No users found.</td></tr>
            <?php endif; ?>
     </table>
  </div>

  

  <button class="add-user-btn" onclick="document.getElementById('addUserForm').style.display='block'">+</button>
    
    <!-- Floating Edit Event Button -->
  <button class="edit-user-btn" onclick="document.getElementById('editUserForm').style.display='block'">✎</button>

       <!-- Event Creation Form -->
        <div id="addUserForm" class="modal">
        <form action="includes/users.inc.php" method="post">
        <input type="text" name="name" placeholder=" Name" >
                    <input type="email" name="email" placeholder="Email" >
                    <input type="password" name="password" placeholder="Password">
            <label for="role">Choose Role:</label>
            <select name="role" id="role">
                <option value="admin" selected>Admin</option>
                <option value="user">User</option>
             </select>
             <button type="submit">Add User</button>
             <button type="button" onclick="document.getElementById('addUserForm').style.display='none'">Cancel</button>
        </form>
        </div>

        <!-- Event Editing Form -->
   <div id="editUserForm" class="modal">
        <form  action="includes/users.inc2.php" method="post">
              <input type="text" name="name" placeholder=" Name" >
              <input type="email" name="email" placeholder="Email" >
              <input type="password" name="password" placeholder="Password">
              <label for="role">Choose Role:</label>
               <select name="role" id="role">
               <option value="admin" selected>Admin</option>
               <option value="user">User</option>
               
            </select>
            
         <button type="submit">Update User</button>
         <button type="button" onclick="document.getElementById('editUserForm').style.display='none'">Cancel</button>
        </form>
      
     <style>
        .button-container {
    position: fixed;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh;
    background-color: #f4f4f4;
}
/* Sidebar */
.sidebar {
    width: 275px;
    background-color: black;
    color: white;
    padding: 20px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
}

.sidebar h2 {
    text-align: center;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin: 20px 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: white;
    display: block;
    padding: 15px;
    background: black;
    text-align: center;
    border-radius: 5px;
    font-size: 18px;
}

.sidebar ul li a:hover {
    background: #1ABC9C;
}.h1{
    text-align: left;
}
.main-content {
    margin-left: 200px;
    margin-bottom:100px;
    padding: 10px;
    width: calc(100% - 320px);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: auto;
}
form input, form textarea, form select, form button {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

form button {
    background: black;
    color: white;
    cursor: pointer;
    padding: 12px;
    width: 100%;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 10px;
    transition: 0.3s;
}

form button:hover {
    background: #16A085;
}

/* Events List */
table {
    width: 50%;
    margin-top: 20px;
    margin-left: 300px;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #bdc3c7;
    padding: 10px;
    text-align: center;
}

th {
    background: black;
    color: white;
}

.add-user-btn, .edit-user-btn{
    position: fixed;
    bottom: 50px;
    width: 60px;
    height: 60px;
    font-size: 24px;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    text-align: center;
    line-height: 60px;
}
.add-user-btn{
    right: 50px;
    background: black;
}
.add-user-btn:hover {
    background: #16A085;
}
.edit-user-btn{
    right: 120px;
    background: black;
}
.edit-user-btn:hover{
    background: #16A085;

}
/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255, 255, 255, 0.858);;;
    padding:20px;
    margin-left: 120px;
    width: 400px;
    max-width: 90%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    z-index: 1000;
}
     </style>
     <?php
            check_signup_errors();
     ?>
=======
/* Modal Overlay */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

/* Active Modal */
.modal.active, .modal-overlay.active {
    display: block;
}
</style>
>>>>>>> 71ffb2f87a7b0f37cfe27b9333d8fa650b7f718d
</body>
</html>