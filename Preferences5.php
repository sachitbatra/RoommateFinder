<?php
    session_start();    

    if (isset($_POST['budget']))
    {
        $_SESSION['budget'] = $_POST['budget'];
    }

    $registered = false; //Default value
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

                <?php
                    if(empty($_SESSION['budget']))
                    {
                        header('Location: preferences4.php');
                    }
                ?>

                <form action="preferences6.php" method="POST"style="color: white;">
                    ARE YOU FLUENT IN ENGLISH: <br>
                    <input class="prefInput" type="radio" name="english" value="1" style="height: 4vh; width: 4vw; margin-left:14vw;"> Yes
                    <input class="prefInput" type="radio" name="english" value="0" style="height: 4vh; width: 4vw;"> No <br>
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