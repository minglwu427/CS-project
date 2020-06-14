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
<title>Add MovieActor Relation</title>
<header>
    <h1>Add MovieActor Relation</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><strong>Add Actor to Movie</strong></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>

    </nav>

    <p> Please add relation between the Actor to movie using  this page
    </p>
    <form action="PageI4.php" method="Get">
        <h2>Select Movie Title</h2>

        <select name="mid">
        <?php
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
            $rs =  $db->query("select id, title from Movie;");
            while($row = $rs->fetch_assoc()){
                $movieid = $row['id'];
                $title = $row['title'];
                echo '<option value = '.$movieid.'>' .$title. '</option>';
            }
            $rs -> free();           
            $db ->close();
        ?>
        </select>
        
        <br>
        
        
        <h2>Select Actor</h2>
        <select name="actor">
            <?php
            
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
        

            $rs =  $db->query("select id, concat(first, ' ', last) as name from Actor;");
            while($row = $rs->fetch_assoc()){
                $actorid = $row['id'];
                $name = $row['name'];
                echo '<option value = '.$actorid.'>' .$name. '</option>';
            }
            $rs -> free();           
            $db ->close();
        ?>
        </select>
        
        <br>
        
        <h2>Enter Actors Role</h2>
        <input type="text" name="role" placeholder="Somebody">
        
        <br>
        <input type="submit">
    </form>

    <?php
            
            $mid = $_GET['mid'];
            $actor = $_GET['actor'];
            $role = $_GET['role'];

            if ($mid and $actor and $role){
                $db = new mysqli('localhost','cs143','','CS143');
                if ($db-> connect_errno>0){
                    die('Unable to connect to databse [' . $db->connect_error. ']');
                }

                $actorrs = $db -> query( "INSERT INTO MovieActor VALUES (".$mid.", ".$actor.",'".$role."');");

                if ($actorrs === TRUE){
                    //echo "New record has been created";
                    echo "<p align='center'><font color=magenta  size='6pt'>New record has been created.</font> </p>";
                }else{
                    //echo "Error: something is wrong" ;
                    echo "<p align='center'><font color=magenta  size='6pt'>Error: something is wrong</font> </p>";
                }

                mysqli_close($db);
            } else if ($mid and $actor){
                //echo "actor have no role";
                echo "<p align='center'><font color=magenta  size='6pt'>This actor has no role.</font> </p>";
            }
    
            
            
            
        ?>



</body

</html>
