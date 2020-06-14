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
<title>Actor/ Movie Browsing</title>
<header>
    <h1>Actor/ Movie Browsing</h1>
</header>

<body>

    <nav>
      
        <li><strong>Search Actor/ Movie</strong></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>
      
    </nav>

    <p> Search an Actor or Movie here:
    </p>
    <form action="PageB1.php" method="Get">
           <input type="text" name="ActorS" placeholder="Actor Name">
        <input type="submit">
    </form>

    <?php
         
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
            
            $input = $_GET['ActorS'];

            $asearch = explode(" ", $input);

            if(sizeof($asearch) == 1)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor having name like '%".$asearch[0]."%';");
                $ps = $db -> query("select title, year, id from Movie where title like '%".$asearch[0]."%';");
            }

            else if(sizeof($asearch) == 2)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like '%".$asearch[0]."%' AND name like '%".$asearch[1]."%';");

                $ps = $db -> query( "select title, year, id from Movie  where title like '%".$asearch[0]."%' AND title like '%".$asearch[1]."%';");
            }
            
            else if(sizeof($asearch) == 3)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like  '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%';");

                $ps = $db -> query( "select title, year, id from Movie  where title like  '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%';");
            }

            else if(sizeof($asearch) == 4)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id, from Actor  having name like '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%';");

                $ps = $db -> query( "select title, year, id from Movie where title like '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%';");
            }

            else if(sizeof($asearch) == 5)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%' AND name like '%".$asearch[4]."%';");

                $ps = $db -> query( "select title, year, id from Movie where title like '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%' AND title like '%".$asearch[4]."%';");
            }

            else if(sizeof($asearch) == 6)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like  '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%' AND name like '%".$asearch[4]."%' AND name like '%".$asearch[5]."%';");

                $ps = $db -> query( "select title, year, id from Movie  where title like  '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%' AND title like '%".$asearch[4]."%' AND title like '%".$asearch[5]."%';");
            }

            else if(sizeof($asearch) == 7)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%' AND name like '%".$asearch[4]."%' AND name like '%".$asearch[5]."%' AND name like '%".$asearch[6]."%';");

                $ps = $db -> query( "select title, year, id from Movie where title like '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%' AND title like '%".$asearch[4]."%' AND title like '%".$asearch[5]."%' AND title like '%".$asearch[6]."%';");
            }

            else if(sizeof($asearch) == 8)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like  '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%' AND name like '%".$asearch[4]."%' AND name like '%".$asearch[5]."%' AND name like '%".$asearch[6]."%' AND name like '%".$asearch[7]."%';");

                $ps = $db -> query( "select title, year, id from Movie where title like  '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%' AND title like '%".$asearch[4]."%' AND title like '%".$asearch[5]."%' AND title like '%".$asearch[6]."%' AND title like '%".$asearch[7]."%';");
            }

            else if(sizeof($asearch) == 9)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like  '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%' AND name like '%".$asearch[4]."%' AND name like '%".$asearch[5]."%' AND name like '%".$asearch[6]."%' AND name like '%".$asearch[7]."%' AND name like '%".$asearch[8]."%';");

                $ps = $db -> query( "select title, year, id from Movie where title like  '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%' AND title like '%".$asearch[4]."%' AND title like '%".$asearch[5]."%' AND title like '%".$asearch[6]."%' AND title like '%".$asearch[7]."%' AND title like '%".$asearch[8]."%';");

            }

            else if(sizeof($asearch) == 10)
            {
                $rs = $db -> query( "select concat(first, ' ', last) as name, dob, id from Actor  having name like  '%".$asearch[0]."%' AND name like '%".$asearch[1]."%' AND name like '%".$asearch[2]."%' AND name like '%".$asearch[3]."%' AND name like '%".$asearch[4]."%' AND name like '%".$asearch[5]."%' AND name like '%".$asearch[6]."%' AND name like '%".$asearch[7]."%' AND name like '%".$asearch[8]."%' AND name like '%".$asearch[9]."%';");

                $ps = $db -> query( "select title, year, id from Movie where title like  '%".$asearch[0]."%' AND title like '%".$asearch[1]."%' AND title like '%".$asearch[2]."%' AND title like '%".$asearch[3]."%' AND title like '%".$asearch[4]."%' AND title like '%".$asearch[5]."%' AND title like '%".$asearch[6]."%' AND title like '%".$asearch[7]."%' AND title like '%".$asearch[8]."%' AND title like '%".$asearch[9]."%';");
            }
    
            echo "<p align='center'><font color=magenta  size='6pt'>ACTORS/ ACTRESSES: </font> </p>";
            //echo nl2br("\nList of Actors/ Actresses Matching your Search: \n\n");
            $whileCount = 0;
            if ($rs->num_rows > 0)
            {
                
    			while($row = $rs->fetch_assoc())
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
    					echo "<td align=\"center\"><a href='Show_A.php?id=" . $row['id'] . " ' class='aa' >" . $value . "</a></td>";
					}

					echo "</td></tr>";

    			}

                $whileCount = 0;
    			echo "</table>";
			}

            $rs -> free();

            echo "<p align='center'><font color=magenta  size='6pt'>MOVIES: </font> </p>";
            //echo nl2br("\nList of Movies Matching your Search: \n\n");

            $whileCount = 0;
            if ($ps->num_rows > 0)
            {
                
                while($row = $ps->fetch_assoc())
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
                        echo "<td align=\"center\"><a href='Show_M.php?id=" . $row['id'] . " ' class='aa' >" . $value . "</a></td>";
                    }

                    echo "</td></tr>";

                }

                $whileCount = 0;
                echo "</table>";
            }

            $ps -> free();


            mysql_close($db)
        ?>



</body

</html>
