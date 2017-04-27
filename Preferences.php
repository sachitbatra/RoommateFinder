<?php
    require 'Preferences-Connect.php';
    session_start();    

    if (!isset($_SESSION['email']))
    {
        header('Location: one.html');
    }

    $email_id = $_SESSION['email'];
    $query = "SELECT id FROM preferences WHERE email = '$email_id'";

    if ($query_run = mysql_query($query))
    {
        $query_num_rows = mysql_num_rows($query_run);

        if ($query_num_rows == 0)
        {
            $registered = false;          
        }

        else
        {
            $registered = true;
            $user_id = mysql_result($query_run, 0, 'id');
            $_SESSION['user_id'] = $user_id;
            header('Location: prefView.html');
        }
    }

    else
    {
        $registered = false; //Default value
    }
?>

<html>
    <head>
        <title> Preferences </title>
        <link rel="stylesheet" type="text/css" href="PreferencesCSS.css">
    </head>

    <body>
        <div id="preferenceBackground">

            <div id="topDiv">
                <input class="btn" type="button" name="home" value="Home" id="home" onclick="callhome()">
                <input class="btn" type="button" name="aboutUs" value="About Us" id="aboutUs" onclick="callAboutUs()">
                <img src="um.png" id="logo" width="120" height="120">
                <input class="btn" type="button" name="contactUs" value="Contact Us" id="contactUs" onclick="callContactUs()">
                <input class="btn" type="button" name="logOut" value="Log Out" id="logOut" onclick="location.href = 'logOut.php';">
		    </div>

            <div id="preferenceContent">
                <h1 style="margin-top: 7vh; color:white; margin-left:14vw;"> REGISTER </h1>

                <form action="preferences1.php" method="POST"style="color: white;">
                    ENTER THE NUMBER OF ROOMATES YOU WANT: 
                    <input class="prefInput" type="number" name="numRoommates" placeholder="SELECT" > <br>
                    <input type="submit" value="NEXT" id="next_id">
                </form>
            </div>
        </div>

        <script>

            var prefBox = document.querySelector("#preferenceBackground");
            document.body.onload = function() {prefBox.style.display="block";}
            function callhome()
			{
				window.location="homepagefinal.html";
			}
			function callAboutUs()
			{
			  window.location="about1.html";
			}
			function callContactUs()
			{
			  window.location="contactUs.html";
			}
			function callProfilePage()
			{
			  window.location="userProfile.html";
			}

        </script>
    </body>
</html>