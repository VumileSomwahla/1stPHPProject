<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        //Link to a file that we have somewhere
        require_once "dbh-inc.php";

        $query = "UPDATE users SET username = :username, pwd = :pwd, email = :email  WHERE id = 2";
        //Submitting to the database
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $name);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;


        header("Location: ../index.php");
        //It has a connection, therefore we have to use die and not exit
        die();
    } catch (PDOException $e) {

        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
