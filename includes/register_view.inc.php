<?php
// This file is for output
declare(strict_types=1);


function check_signup_errors() {
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        echo "<br>"; // Added missing semicolon
        foreach ($errors as $error) {
            echo "<h1>" . htmlspecialchars($error) . "</h1>"; // Prevent XSS
        }
        unset($_SESSION['errors']); // Clear errors after displaying
    }
    elseif(isset($_GET["signup"])&& $_GET["signup"]=="success"){
        echo "<br>";
        echo "<h3>Registration successful</h3>";
    }
}


?>
