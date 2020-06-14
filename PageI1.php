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
<title>Add Actor/Director</title>
<header>
    <h1>Add new Actor/Director</h1>
</header>

<body>

    <nav>

        <li><a href="PageB1.php">Search Actor/ Movie</a></li>
        <li><a href="Show_A.php">Show Actor Information</a></li>
        <li><a href="Show_M.php">Show Movie Information</a></li>
        <li><strong>Add Actor/ Director Information</strong></li>
        <li><a href="PageI2.php">Add Movie Information</a></li>
        <li><a href="PageI4.php">Add Actor to Movie</a></li>
        <li><a href="PageI5.php">Add Director to Movie</a></li>

    </nav>

    <p> Please add new actor or director using this page
    </p>
    <form action="PageI1.php" method="Get">
        
        <h2>Select Actor or Director</h2>
        <select name = "role">
        <option value = "Actor">Actor</option>
        <option value="Director">Director</option>
        </select>
        <br>
        
        <h2>Enter First Name</h2>
        <input type="text" name="first" placeholder="First Name">
        
        <h2>Enter Last Name</h2>
        <input type="text" name="last" placeholder="Last Name">
        
        <h2>Select Gender</h2>
        <select name = "gender">
        <option value = "Male">Male</option>
        <option value="Female">Female</option>
        </select>
        
        <h2>Enter Date of Birth</h2>
        <input type="text" name="DOB" placeholder="1993-05-01">
        <br>

        <h2>Enter Date of Die</h2>
        <input type="text" name="DOD" placeholder="1993-05-01">
        <p>Leave blank if they are still alive</p>
        <input type="submit">
    </form>

    <?php
            
            function validateDate($date, $format = 'Y-m-d')
            {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) == $date;
            }
            $role = $_GET['role'];
            $first = $_GET['first'];
            $last = $_GET['last'];
            $gender = $_GET['gender'];
            $DOB = $_GET['DOB'];
            $DOD = $_GET['DOD'];
            $okToadd = false;
            $updated = false;

    
            if ($first === "" or $last === "" or $DOB === ""){
                echo "<p align='center'><font color=magenta  size='6pt'>You did not input first name, last name, or date of birth.</font> </p>";
                //echo "You did not input first name, last name or date of birth";
            } else if(validateDate($DOB)== false and $DOB){
                echo "<p align='center'><font color=magenta  size='6pt'>Not a valid format for date.</font> </p>";
                //echo "Not valid format for date";
            } else if ($first and $last and $DOB) {
                if($DOD == ""){
                    $DOD = "NULL";
                    $okToadd = true;
                    #echo $okToadd;
                } else if (validateDate($DOD) == false){
                    echo "<p align='center'><font color=magenta  size='6pt'>Not a valid format for date.</font> </p>";
                    //echo "Not valid format for date";
                } else {
                    $DOD = "'$DOD'";
                    $okToadd = true;
                }
            }

    
            if ($okToadd){
                $db = new mysqli('localhost','cs143','','CS143');
                if ($db-> connect_errno>0){
                    die('Unable to connect to databse [' . $db->connect_error. ']');
                }

                $maxID = $db -> query( "SELECT * FROM MaxPersonID;");
                while ($row = mysqli_fetch_assoc($maxID)){
                    $C_maxID = $row['id'];
                    $N_maxID = $C_maxID+1;

                }

                if ($role == 'Director'){

                    mysqli_query($db,
                                 "INSERT INTO Director 
                                 Values (".$C_maxID.",'".$last."','".$first."','".$DOB."',".$DOD.");");
                    $updated = true;
                } else{

                    
                    mysqli_query($db,
                                 "INSERT INTO Actor 
                                 Values (".$C_maxID.",'".$last."','".$first."', 
                                 '".$gender."','".$DOB."',".$DOD.");");
                    $updated = true;

                }
                if ($updated){
                    mysqli_query($db,"UPDATE MaxPersonID SET id = ".$N_maxID.";");
                    //echo "You have add actor/director";
                    echo "<p align='center'><font color=magenta  size='6pt'>You have added an actor/director.</font> </p>";
                }
                /*
                $moviers = $db -> query( "INSERT INTO MovieDirector VALUES (" .$movie."," .$director.");");

                if ($moviers === TRUE){
                    echo "New record has been created";
                }else{
                    echo "Error: the connect was there alread" ;
                }
                */
                mysql_close($db);
            }
        ?>



</body

</html>
