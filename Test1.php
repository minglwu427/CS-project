
<html>
    
        <title>Online Calculator</title>
    <header>
        <h1>Online Calculator</h1>
    </header>
    <body>

        <h2>Input</h2>
        <p>Please put your input in here.  This program will not take anything beside numbers, *, +, - and /.  Everything else will return an error</p>
       <form action = "Test1.php" method="get">
           <input type="text" name="Calculation" placeholder="Calculation">
           <input type="submit">
        </form>
        
        <h2>Output</h2>
        <?php
            
            $pattern ="/[^*\d\/+-.]/";
            $calculation = $_GET['Calculation'];
        
            if (preg_match($pattern,$calculation)){
                echo 'invalid input';
                exit();
            }
            else {
                try{
                    $number =eval('return '.$calculation.';') ;
                    
                        if ($number === INF){
                            echo "Divide by Zero";
                            exit();
                        } 
                        else{
                            echo $number;
                            exit();
                        }
                }
                catch (ParseError $e){
                    echo "Invalid Input" ;
                    exit();
                }


            }
        
                
        
                
            #$match  = preg_match($pattern,$calculation)
            #print $calculation
        
        ?>
        
   
    </body>
</html>

