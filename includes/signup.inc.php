<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbh-inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // Create an errors array to store error messages
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Please fill in all fields.";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email address.";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already exists.";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_registered"] = "Email is already registered.";
        }

        // Start session and store errors if any
        session_start();
        if (!empty($errors)) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php"); // Redirect back to the form
            exit();
        }

        // If no errors, create user
        create_user($pdo, $username, $pwd, $email);
        header("Location: ../index.php?signup=success");
        exit();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
