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
<title>Add MovieDirector</title>
<header>
    <h1>Add Movie Director</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><strong>Add Director to Movie</strong></li>

    </nav>

    <p> Please add relation between the director to movie using  this page
    </p>
    <form action="PageI5.php" method="Get">
        <h2>Select Director</h2>

        <select name="director">
        <?php
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
            $rs =  $db->query("select id, concat(first, ' ', last) as name from Director;");
            while($row = $rs->fetch_assoc()){
                $directorid = $row['id'];
                $name = $row['name'];
                echo '<option value = '.$directorid.'>' .$name. '</option>';
            }
            $rs -> free();           
            $db ->close();
        ?>
        </select>
        <br>
        
        <h2>Select Movie</h2>
        <select name="Movie">
            <?php
            
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
        

            $rs =  $db->query("select id, title from Movie;");
            while($row = $rs->fetch_assoc()){
                $movieid = $row['id'];
                $name = $row['title'];
                echo '<option value = '.$movieid.'>' .$name. '</option>';
            }
            $rs -> free();           
            $db ->close();
        ?>
        </select>

        <br>
        <br>

        <input type="submit">
    </form>

    <?php
            $director = $_GET['director'];
            $movie = $_GET['Movie'];
            
            #echo "the director is " .$director.;
                
            if ($director and $movie){
                $db = new mysqli('localhost','cs143','','CS143');
                if ($db-> connect_errno>0){
                    die('Unable to connect to databse [' . $db->connect_error. ']');
                }

                $moviers = $db -> query( "INSERT INTO MovieDirector VALUES (" .$movie.",".$director.");");

                if ($moviers === TRUE){
                    //echo "New record has been created";
                    echo "<p align='center'><font color=magenta  size='6pt'>New record has been created.</font> </p>";
                }else{
                    //echo "Error: the connect was there already" ;
                    echo "<p align='center'><font color=magenta  size='6pt'>Error: the connect was there already</font> </p>";
                }
                mysqli_close($db);
            }
        ?>



</body

</html>
