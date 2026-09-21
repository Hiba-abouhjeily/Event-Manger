<?php
// This file is for output
declare(strict_types=1);

function check_signup_errors() {
    $toastStyle = "position: fixed; top: 20px; right: 20px; padding: 15px 20px; font-size: 16px; color: white; border-radius: 5px; 
                   box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); z-index: 9999; opacity: 1; transition: opacity 0.5s ease-in-out;";
    
    $errorStyle = "background-color: #ff4d4d;";
    $successStyle = "background-color: #4CAF50;";

    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        echo '<div id="toast-message" style="'.$toastStyle.$errorStyle.'">';
        foreach ($_SESSION['errors'] as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
        echo '</div>';

        // Keep the form open if there are errors
        echo '<script>document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("addEventForm").style.display = "block";
        });</script>';

        unset($_SESSION['errors']); 
    } elseif (isset($_GET["enter"]) && $_GET["enter"] == "success") {
        echo '<div id="toast-message" style="'.$toastStyle.$successStyle.'"><p>Enter success</p></div>';
    } elseif (isset($_GET["update"]) && $_GET["update"] == "success") {
        echo '<div id="toast-message" style="'.$toastStyle.$successStyle.'"><p>Update success</p></div>';
    } elseif (isset($_GET["delete"]) && $_GET["delete"] == "success") {
        echo '<div id="toast-message" style="'.$toastStyle.$errorStyle.'"><p>Delete success</p></div>';
    }
}
?>
