<?php
    session_start();   

    if (isset($_POST['numRoommates']))
    {
        $_SESSION['numRoommates'] = $_POST['numRoommates'];
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

                <form action="preferences2.php" method="POST"style="color: white;">
                    ENTER THE YEAR IN WHICH YOU'RE STUDYING: 
                    <input class="prefInput" type="number" name="year" placeholder="SELECT" > <br>
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