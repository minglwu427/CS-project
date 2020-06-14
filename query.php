
<html>
    <head>
	<style>
		table, th, td {
    		border: 1px solid black;
		}
	</style>
	</head>
        <title>Query Inputer</title>
    <header>
        <h1>Database Query Inputer</h1>
    </header>
    <body>

        <h2>Input</h2>
        <p>Please put your input in here.  This program will take in any SQL input here and here we are assuming that users will always issue correct SELECT queries and all user inputs can be trusted.
        </p>
        
        
        <form action = "" method="get">
           
            <TEXTAREA NAME = "query" ROWS = "10" COLS = "50">
            Select * from Actor Limit 10;
            </TEXTAREA>
            
            <input type="submit">
        </form>
        
        <h2>Output</h2>
        
        <?php
            
            $db = new mysqli('localhost','cs143','','CS143');
            if ($db-> connect_errno>0){
                die('Unable to connect to databse [' . $db->connect_error. ']');
            }
        
            
            //This is how you do a query
            $query = $_GET['query'];

            //$query = "Select * from Actor limit 20";
            $rs =  $db->query($query);
        	
            
            /*$a = $rs->fetch_assoc();
            foreach ($a as $key => $value)
            {
    			print "$key ";
			}
			print "<br/ >";
            while($row = $rs->fetch_assoc()) {
            
            	foreach ($row as $key => $value)
            	{
    				print "$value ";
				}

				print "<br/ >";
     
            }*/   
            

            $whileCount = 0;
            if ($rs->num_rows > 0)
            {
    			/*echo "<table><tr>";
            	$a = $rs->fetch_assoc();
            	foreach ($a as $key => $value)
            	{
    				echo "<th>" . $key . "</th>";
				}
				echo "</tr>";*/
    		// output data of each row
                
    			while($row = $rs->fetch_assoc())
    			{
        			$whileCount++;
                    if($whileCount == 1)
                    {
                        echo "<table><tr>";
                        foreach ($row as $key => $value)
                        {
                            echo "<th>" . $key . "</th>";
                        }
                        echo "</tr>";
                    }

                    echo "<tr>";

        			foreach ($row as $key => $value)
            		{
    					echo "<td>" . $value . "</td>";
					}

					echo "</td></tr>";
					

        			//echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
    			}
                $whileCount = 0;
    			echo "</table>";
			}

			else
			{
    			echo "0 results";
			}


        
            print 'Total results:' .$rs->num_rows;
            $rs -> free();
            
            //this is how you update value 
            
            //$query = "UPDATE Student SET email = concat(email, '.edu')";
            //$db -> query($query)
            //print 'Total rows updated: ' . $db->affected_rows;
            
            $db ->close();

        ?>
        
   
    </body>
</html>

