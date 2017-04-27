<?php
    require 'Preferences-Connect.php';
    session_start();    
    $email_id = 'placeholder'; //$_SESSION['email_id'];
    $query = "SELECT id FROM users WHERE email = '$email_id'";

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

        <style>
            #firstQ
            {
                display = "none";
            }

            #secondQ
            {
                display = "none";
            }
        </style>
    </head>

    <body>
        <div id="preferenceBackground">
            <div id="preferenceContent">
                <button id="closePref">X</button>
                <h1> Register </h1>

                <div id="firstQ">
                    <form action="preferences.php" method="POST">
                        <input style = "width: 100%;" class="prefInput" type="number" name="numRoommates" placeholder="Enter the number of roommates you want" > <br>
                        <input type="submit" value = "Next" onclick="next_step1()">
                    </form>
                </div>

                <div id="secondQ">
                    <form action="preferences.php" method="POST">
                        <input class="prefInput" type="number" name="year" placeholder="Enter the year in which you're studying" > <br>
                        <input type="submit" value = "Next" onclick="next_step2()">
                    </form>
                </div>
                    
                    <input class="prefInput" type="text" name="stream" placeholder="Enter your stream"> <br> <br>

                    <input class="prefInput" type="text" name="cuisine" placeholder="Are you vegetarian or non-vegetarian?"> <br> <br>

                    <input class="prefInput" type="number" name="budget" placeholder="How much are you willing to pay for the room every month?"> <br> <br>

                    <label> Select all the languages that you are fluent in <br>
                    <input type="checkbox" name="english"> English
                    <input type="checkbox" name="hindi"> Hindi
                    <input type="checkbox" name="kannada"> Kannada
                    <input type="checkbox" name="telgu"> Telgu
                    <input type="checkbox" name="tamil"> Tamil
                    <input type="checkbox" name="tulu"> Tulu
                    </label>
                </form>
            </div>
        </div>

        <script>

            var prefBox = document.querySelector("#preferenceBackground");
            var closePref = document.querySelector("#closePref");
            closePref.onclick = function() {prefBox.style.display="none"};

            <?php
                if ($registered == false)
                {
                    echo<<<POPUP
                    document.body.onload = function() {prefBox.style.display="block";}
POPUP;
                }

                else
                {
                    echo<<<POPUP
                    document.body.onload = function() {prefBox.style.display="none";}
POPUP;
                }
            ?>

            var firstQ = document.querySelector("#firstQ");
            var secondQ = document.querySelector("#secondQ");

            function next_step1()
            {
                firstQ.parentNode.removeChild(firstQ);
            }

        </script>
    </body>
</html>