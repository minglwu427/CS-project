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
<title>Add New Movie</title>
<header>
    <h1>Add New Movie</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><strong>Add Movie Information</strong></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>

    </nav>

    <p> Please add new Movie using this page
    </p>
    <form action="PageI2.php" method="Get">
        
        <h2>Enter movie title name.  Please don't use ' or "</h2>
        <input type="text" name="title" placeholder="movie title">
        
        <h2>Enter production company</h2>
        <input type="text" name="company" placeholder="company name">
        
        <h2>Enter year made</h2>
        <input type="text" name="year" placeholder="1995">
        <br>

        <h2>Enter MPAA Rating</h2>
        <select name = "MPAA">
        <option value = "G">G</option>
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
        <option value="NC-17">NC-17</option>
        </select> 
        <br>    
        
        <h2>Select Genre (Please only pick one)</h2>
        <input type="checkbox" name="genre[]" value="Action"><label>Action</label>
        <input type="checkbox" name="genre[]" value="Adult"><label>Adult</label>
        <input type="checkbox" name="genre[]" value="Adventure"><label>Adventure</label>
        <input type="checkbox" name="genre[]" value="Comedy"><label>Comedy</label>
        <input type="checkbox" name="genre[]" value="Documentary"><label>Documentary</label>
        <input type="checkbox" name="genre[]" value="Drama"><label>Drama</label> <input type="checkbox" name="genre[]" value="Family"><label>Family</label>
        <input type="checkbox" name="genre[]" value="Fantasy"><label>Fantasy</label>
        <input type="checkbox" name="genre[]" value="Horror"><label>Horror</label>
        <input type="checkbox" name="genre[]" value="Musical"><label>Musical</label>
        <input type="checkbox" name="genre[]" value="Mystery"><label>Mystery</label>
        <input type="checkbox" name="genre[]" value="Romance"><label>Romance</label>
        <input type="checkbox" name="genre[]" value="Sci-Fi"><label>Sci-Fi</label>        
        <input type="checkbox" name="genre[]" value="Thriller"><label>Thriller</label>
        <input type="checkbox" name="genre[]" value="Short"><label>Short</label>
        <input type="checkbox" name="genre[]" value="War"><label>War</label>
        <input type="checkbox" name="genre[]" value="Western"><label>Western</label>


        
        
        <br>
        <br>
        <input type="submit">
    </form>

    <?php
            
            function validateyear($year)
            {
                if ($year > 2030 or $year < 1900 ){
                    return false;
                } else{
                    return true;
                }
            }
            $title = $_GET['title'];
            $company = $_GET['company'];
            $year = $_GET['year'];
            $MPAA = $_GET['MPAA'];
            $genre = $_GET['genre'];

            $okToadd = false;
            $updated = false;

        
            if ($title === "" or $company === "" or $year === ""){
                //echo "You did not input title, company name or year";
                echo "<p align='center'><font color=magenta  size='6pt'>You did not input a title, company name or year.</font> </p>";
            } else if(validateyear($year)== false and $year){
                //echo "Not valid format for year";
                echo "<p align='center'><font color=magenta  size='6pt'>Not a valid format for year.</font> </p>";
            } else if($genre[0] === ""){
                //echo "you didn't select a genre";
                echo "<p align='center'><font color=magenta  size='6pt'>You did not select a genre.</font> </p>";
            }
                else if ($title and $genre[0] and $MPAA){
                $okToadd = true;
            }

            
            if ($okToadd){
                $db = new mysqli('localhost','cs143','','CS143');
                if ($db-> connect_errno>0){
                    die('Unable to connect to databse [' . $db->connect_error. ']');
                }
            
                $maxID = $db -> query( "SELECT * FROM MaxMovieID;");
                while ($row = mysqli_fetch_assoc($maxID)){
                    $C_maxID = $row['id'];
                    $N_maxID = $C_maxID+1;
                }
            
             
                mysqli_query($db,
                             "INSERT INTO Movie 
                             Values (".$C_maxID.",'".$title."','".$year."','".$MPAA."','".$company."');");
                
                mysqli_query($db,
                "INSERT INTO MovieGenre Values(".$C_maxID.",'".$genre[0]."');"
                );
                
                $updated = true;
                 
                
                if ($updated){
                    mysqli_query($db,"UPDATE MaxMovieID SET id = ".$N_maxID.";");
                    //echo "you have added the move and movie genre to their respective table";
                    echo "<p align='center'><font color=magenta  size='6pt'>You have added the movie and movie genre to thier respective table.</font> </p>";
                }                
                mysql_close($db);
            }
        ?>



</body

</html>
