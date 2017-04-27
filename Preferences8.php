<?php
    require 'Preferences-Connect.php';
    session_start();    

    if (isset($_POST['kannada']))
    {
        $_SESSION['kannada'] = $_POST['kannada'];
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
            <div id="preferenceContent">
                <button id="closePref">X</button>
                <h1> Register </h1>

                <?php
                        $email = $_SESSION['email'];
                        $numRoommates = $_SESSION['numRoommates'];
                        $year = $_SESSION['year'];
                        $stream = $_SESSION['stream'];
                        $cuisine = $_SESSION['cuisine'];
                        $budget = $_SESSION['budget'];
                        $english = $_SESSION['english'];
                        $hindi = $_SESSION['hindi'];
                        $kannada = $_SESSION['kannada'];

                        $query = "INSERT INTO preferences VALUES ('','$email','$numRoommates','$year','$stream','$cuisine','$budget','$english','$hindi','$kannada')";
                        if ($query_run = mysql_query($query))
                        {
                            header('Location: prefView.html');
                        }
                        
                        else
                        {
                            echo mysql_error();
                        }   
                ?>
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

        </script>
    </body>
</html>