<?php
$profpic = "bg.jpg";
?>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

    </style>

    <STYLE type="text/css">
        h1 { text-align: center}
        nav { text-align: center}
        p { text-align: center}
        form { text-align: center}
    </STYLE>
    
    <style type="text/css">
        body
        {
            background-image: url('<?php echo $profpic;?>');
        }
    </style>

</head>
<title>Actor Information</title>
<header>
    <h1>Actor Information</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>    
        <li><strong>Show Actor Information</strong></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>
      
    </nav>

    <p> Search for Another Actor/ Movie:
    </p>
    <form action="PageB1.php" method="Get">
           <input type="text" name="ActorS" placeholder="Actor Name">
        <input type="submit">
    </form>

    <?php
         
            function printTable($queryInput, $file)
            {
                $whileCount = 0;
                if ($queryInput->num_rows > 0)
                {
                // output data of each row
                    
                    while($row = $queryInput->fetch_assoc())
                    {
                        $whileCount++;
                        if($whileCount == 1)
                        {
                            echo "<table align=\"center\"><tr>";
                            foreach ($row as $key => $value)
                            {
                                echo "<th>" . $key . "</th>";
                            }
                            echo "</tr>";
                        }

                        echo "<tr>";

                        foreach ($row as $key => $value)
                        {
                            echo "<td align=\"center\"><a href='" . $file . "?id=" . $row['id'] . " ' class='aa' >" . $value . "</a></td>";
                        }

                        echo "</td></tr>";
                        
                    }
                    $whileCount = 0;
                    echo nl2br("</table>\n");
                }

                $queryInput -> free();
            }

            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
            
            $id = $_GET['id'];
            //echo $id;

            $ps = $db -> query("select concat(first, ' ', last) as name, sex, dob, dod, id from Actor having id like ".$id.";");
            echo "<p align='center'><font color=magenta  size='6pt'>ACTOR INFORMATION: </font> </p>";
            //echo nl2br("The Actor Information is:\n\n");
            printTable($ps, "Show_A.php");


            $qs = $db -> query("select MA.role, Movie.title, Movie.id from MovieActor As MA inner join Movie as Movie ON MA.mid = Movie.id where aid = " .$id. ";");

            echo "<p align='center'><font color=magenta  size='6pt'>MOVIES & ROLES: </font> </p>";
            //echo nl2br("The Actor's Movies and Roles are:\n\n");
            printTable($qs, "Show_M.php");

            mysql_close($db);          
    
        ?>



</body

</html>
