<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $pets = htmlspecialchars($_POST["favouritepet"]);

    if (empty($firstname)) {
        exit();
        header("Location: ../index.php");
    }

    echo "These are the data that the user submitted:";
    echo "<br>";
    echo $firstname;
    echo "<br>";
    echo $surname;
    echo "<br>";
    echo $pets;

} else {
    header("Location: ../index.php");
}
