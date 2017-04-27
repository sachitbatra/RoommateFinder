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
    </head>

    <body>
        <div id="preferenceBackground">
            <div id="preferenceContent">
                <button id="closePref">X</button>
                <h1> Register </h1>
                <form action="preferences.php" method="POST"> 
                    <?php
                      //session_start() ;     
                    if (!isset($numRoommates) && !isset($_POST['numRoommates']))
                    {
                        echo <<<INPUT
                        Enter the number of roommates you want <br>
                        <input class="prefInput" type="number" name="numRoommates" >
                        <input type="submit" value="Next">
INPUT;
                    }

                    else if (!isset($year) && !isset($_POST['year']))
                    {
                        if (isset($_POST['numRoommates']))
                        {
                            echo "working";
                            $numRoommates = $_POST['numRoommates'];
                            echo $numRoommates;
                        }
                        
                        echo <<<INPUT
                        Enter the year in which you're studying <br>
                        <input class="prefInput" type="number" name="year">
                        <input type="submit" value="Next">
INPUT;
                    }

                    else if (!isset($stream) && !isset($_POST['stream']))
                    {
                        if (isset($_POST['year']))
                        {
                            $year = $_POST['year'];
                        }

                        echo <<<INPUT
                        Enter your stream
                        <input class="prefInput" type="text" name="stream">
                        <input type="submit" value="Next">
INPUT;
                    }

                    else if (!isset($cuisine) && !isset($_POST['cuisine']))
                    {
                        if (isset($_POST['stream']))
                        {
                            $stream = $_POST['stream'];
                        }

                        echo <<<INPUT
                        <input class="prefInput" type="text" name="cuisine" placeholder="Are you vegetarian or non-vegetarian?">
                        <input type="submit" value="Next">
INPUT;
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