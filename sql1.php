<?php
    require 'connect_sql.php';
?>

<html>
    <head>
    </head>

    <body>
        Choose a food type: <br>
        <form action="sql1.php" method="GET">
            <select name="opt">
                <option value="u"> Unhealthy </option>
                <option value="h"> Healthy </option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php
    if (isset($_GET['opt']) && !empty($_GET['opt']))
    {
    $input = $_GET['opt'];
    echo"File included. <br>";

    $query = "SELECT food, calories FROM food ORDER BY id DESC";
    
    if ($query_run = mysql_query($query))
    {
        echo'Query Success. <br>';

        if (mysql_num_rows($query_run) == 0)
        {
            echo "No Results Found!";
        }

        while($query_row = mysql_fetch_assoc($query_run))
        {
            $food = $query_row['food'];
            $calories = $query_row['calories'];

            echo $food." - ".$calories."<br>";
        }
    }

    else
    {
        echo'Query Failed - ';
        echo mysql_error();
    } 

    }
?>