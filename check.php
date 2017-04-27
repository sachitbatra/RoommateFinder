<?php
        session_start();

        if (isset($_SESSION['email']))
        {
            header('Location: userProfile.html');
        }

        else
        {
            header('Location: one.html');

        }
?>