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
<title>Adding Review</title>
<header>
    <h1>Adding Review</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><a href="PageI1.php">Add Actor/ Director Information</a></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>

    </nav>

    <p> Please add review for a movie using this page
    </p>
    <form action="PageI3.php" method="Get">
        
        <h2>Select movie title name</h2>
        <select name = "id">
        <?php
            $id = $_GET['id'];
            //$id = 2;
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
            $rs = $db -> query( "SELECT id, title FROM Movie where id = $id;");
            #echo "SELECT title FROM Movie where id = $id;";
            
            while($row = $rs->fetch_assoc()){
                $movieid = $row['id'];
                $title = $row['title'];
                echo '<option value = '.$movieid.'>' .$title. '</option>';
            }
            
            mysqli_close($db);
            
        ?>
        </select>
        

        <h2>Enter your name</h2>
        <input type="text" name="reviewer" value="Who">
        <br>

        <h2>Enter Rating</h2>
        <select name = "rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select> 
        <br>    
          
        <h2>Enter comments</h2>
        <TEXTAREA NAME = "comments" ROWS = "10" COLS = "50"></TEXTAREA>
        
        
        
        <br>
        <input type="submit">
    </form>

    <?php
            //echo $id;   
            $movieid = $_GET['id'];
            $reviewer = $_GET['reviewer'];
            $rating = $_GET['rating'];
            $comments = $_GET['comments'];
            //echo $reviewer;

            $okToadd = false;

            if ($movieid && $reviewer && $rating)
            {             
                $okToadd = true; 
                if ($comments == "")
                {
                    $comments = "N/A";
                }
            }

            
            if ($okToadd){
                $db = new mysqli('localhost','cs143','','CS143');
                if ($db-> connect_errno>0){
                    die('Unable to connect to databse [' . $db->connect_error. ']');
                }
                
         
                $updated = $db -> query( "insert into Review values ('".$reviewer."', null , ".$movieid." , ".$rating." ,'".$comments."');");
       
                
                if ($updated){
                    //echo "you have added the comment";
                    echo "<p align='center'><font color=magenta  size='6pt'>You have added a comment.</font> </p>";
                } else {
                    //echo "you failed at life";
                }
                mysql_close($db);
            }
            
        ?>



</body

</html>
