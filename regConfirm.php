<?php

extract($_GET);

if (!mysql_connect('localhost', 'root', '') || !mysql_select_db('users'))
{
    die(mysql_error());
}


if($passReg==$pass1Reg)
{   echo('Thank You '.$name.' for the Registration.');
    echo('Your registration is successfull.');
    $query = "INSERT INTO regdetails values('$name','$roomNumber','$emailReg','$num','$passReg')";
}
else
{
    echo "Passwords do not match. Please Re-Enter the Passwords.";
    header('Location: one.html');
}
   
   $query_run = mysql_query($query);
   
   if(!$query_run) 
   {
      die('Could not enter data: ' . mysql_error());
   }
   
   header('Location: homepagefinal.html');

?>
