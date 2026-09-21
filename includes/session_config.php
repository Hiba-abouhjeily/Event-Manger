<?php
// Step 1: Improve session security
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// Set cookie parameters
session_set_cookie_params([
    'lifetime' => 1800, // Expire after 30 min
    'domain' => 'localhost', // Valid only in localhost
    'path' => '/', // Cookies accessible from all pages
    'secure' => false, // Change to true in production with HTTPS
    'httponly' => true // Cookies can't be accessed by JavaScript
]);

// Start session
session_start();

// Fix: Correct variable name from `$Session` to `$_SESSION`
if (!isset($_SESSION['last_regeneration'])) { // If session is not created, create it and update the time
    regenerate_session_id();
} else {
    $interval = 60 * 30; // 30 min
    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_id();
    }
}

// Function to regenerate session ID
function regenerate_session_id() {
    session_regenerate_id(true); // Generate new session ID (deletes old session ID)
    $_SESSION['last_regeneration'] = time(); // Set last regeneration time
}
