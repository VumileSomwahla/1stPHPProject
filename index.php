<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h3>Login</h3>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <button>Login</button>
    </form>

    <h3>Sign Up</h3>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <input type="text" name="email" placeholder="E-Mail">
        <button>Sign Up</button>
    </form>

    <?php check_signup_errors(); ?>
</body>

</html>