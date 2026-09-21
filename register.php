<?php
require_once 'includes/session_config.php';
require_once 'includes/register_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Authentication</title>
    <link rel="stylesheet" href="stylereg.css">
    
</head>
<body>
    <div class="container">
        <div class="form-box" id="form-container">
            <img src="images/BLACK LOGO.JPG" alt="event manager ai" class="logo" />

            <!-- REGISTER FORM -->
            <div id="register-form">
                <h2>Register</h2>
                <form action="includes/register.inc.php" method="post">
                    <input type="text" name="name" placeholder="First Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">SIGN UP</button>
                </form>
                <div class="register-forget opacity">
                    <a href="login.php" onclick="showLogin()">Log In</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showLogin() {
            fetch("login.php")
                .then(response => response.text())
                .then(data => {
                    document.getElementById("form-container").innerHTML = data;
                })
                .catch(error => console.error('Error loading login page:', error));
        }

        function showRegister() {
            document.getElementById("register-form").style.display = "block";
            document.getElementById("forgot-password-form").style.display = "none";
        }
   
   </script>
   <?php
   check_signup_errors();
   ?>
</body>
</html>
