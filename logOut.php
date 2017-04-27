<?php
    session_start();        
    $_SESSION = array();
    unset($_SESSION["email"]);
    session_unset();
    header('Location: homepagefinal.html');
  ?>