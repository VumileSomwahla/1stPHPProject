<?php

declare(strict_types=1);



// Start session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function check_signup_errors()
{
    // Check if there are errors in the session
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        // Loop through errors and display each one
        foreach ($errors as $error) {
            echo '<p class="form-error">' . htmlspecialchars($error) . '</p>';
        }

        // Clear errors from the session after displaying
        unset($_SESSION['errors_signup']);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<p class="form-success">Signup Successful!</p>';
    }
}
