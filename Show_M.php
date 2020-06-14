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
<title>Movie Information</title>
<header>
    <h1>Movie Information</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><strong>Show Movie Information</strong></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>

    </nav>

    <p> Search for Another Movie/ Actor:
    </p>
    <form action="PageB1.php" method="Get">
           <input type="text" name="ActorS" placeholder="Actor Name">
        <input type="submit">
    </form>

    <?php
            function justprintTable($queryInput)
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
                            if(file != "")
                            {
                                echo "<td align=\"center\">" . $value . "</td>";
                            }

                            else
                            {
                                echo "<td align=\"center\"><td>" . $value . "</td>";
                            }
                        }

                        echo "</td></tr>";
                        
                    }
                    $whileCount = 0;
                    echo nl2br("</table>\n");
                }

                $queryInput -> free();
            }
            
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
                            if(file != "")
                            {
                                echo "<td align=\"center\"><a href='" . $file . "?id=" . $row['id'] . " ' class='aa' >" . $value . "</a></td>";
                            }

                            else
                            {
                                echo "<td>" . $value . "</td>";
                            }
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
            
            $ls = $db -> query(
                "select m.title, m.company, m.rating, CONCAT(D.first, ' ' , D.last) as director, mg.genre, m.id as id
                from Movie as m left outer join MovieGenre as mg on mg.mid = m.id left outer join MovieDirector as md on m.id = md.mid left outer join Director as D on md.did = D.id where m.id = " . $id . ";");

            echo "<p align='center'><font color=magenta  size='6pt'>MOVIE INFORMATION: </font> </p>";
            //echo nl2br("Movie Information: \n\n");
            printTable($ls, "");
            /*echo nl2br("The Movie Information is:".  ."\n\n");
            echo nl2br("Title: ". "" ."\n");
            echo nl2br("MPAA Rating: ". "" ."\n");
            echo nl2br("Director: ". "" ."\n");
            echo nl2br("Genre: ". "" ."\n");*/


            $ps = $db -> query("select CONCAT(a.first, ' ', a.last) as names, ma.role, ma.aid as id
                FROM Movie as m 
                left outer join MovieActor as ma on m.id = ma.mid
                left outer join Actor as a on ma.aid = a.id where m.id = ".$id.";");

            echo "<p align='center'><font color=magenta  size='6pt'>ACTORS IN MOVIE: </font> </p>";
            //echo nl2br("The Actors in this Movie are:\n\n");
            printTable($ps, "Show_A.php");

            $qs = $db -> query("select * from Review where mid = " .$id. ";");
            $as = $db -> query("select avg(rating) as average from Review group by mid having  mid = " .$id. ";");
            $file = "PageI3.php";
            
            $drow = $as->fetch_assoc();
            $score = $drow['average'];
            

            echo "<p align='center'><font color=magenta  size='6pt'>USER REVIEWS: </font> </p>";
            justprintTable($qs);
            echo "<p align='center'>The average score is: ".$score." </p>";

            echo "<p align='center'><a href='" . $file . "?id=" . $id . " ' class='aa' >" . "Click to Add Review" . "</a></p>";
            //echo nl2br("User Review:\n");
            //echo nl2br("\n");
            mysql_close($db);           
    
        ?>



</body

</html>
