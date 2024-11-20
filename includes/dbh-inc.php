<?php

// Database credentials
$host = "localhost";
$dbname = "myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    // Set error reporting mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set fetch mode to associative arrays by default
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Database connection successful"; // Optional for debugging
} catch (PDOException $e) {
    // Catch and handle errors
    die("Error connecting to database: " . $e->getMessage());
}
