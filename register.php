<?php
    require 'logging-in-Core.php';

    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
    {
        echo "You are already registered and logged in.";
    }

    else
    {
?>

<form action="register.php" method="POST">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    Password: <input type="password" name="password_again" value="">
    <input type="submit" value="Register">
<?php
    }
?>