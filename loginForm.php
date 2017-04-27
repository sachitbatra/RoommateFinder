<?php
    session_start();
    $email=$_POST['email_signIn'];
    $password=$_POST['passSignIn'];

    mysql_connect('localhost', 'root', '');
    mysql_select_db('users');


    $query = "SELECT password FROM regDetails WHERE email = '$email'";

    if ($query_run = mysql_query($query))
    {
        $query_row = mysql_fetch_assoc($query_run);
        $pass1 = $query_row['password'];
    }

    else
    {
      echo mysql_error();
    }
    
    if($pass1==$password)
    {
        $_SESSION['email'] = $email;
        header('Location: userProfile.html');
    }

    else 
    {
        header('Location: one.html');
    }

  ?>
