<!DOCTYPE html>
<!--
CPSC 471 - Group 7
Supermarket Database
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supermarket</title>

        <!-- Font from https://fonts.google.com/ -->
        <link href="https://fonts.googleapis.com/css?family=Happy+Monkey" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' type='text/css' rel='stylesheet' >
        <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,700' type='text/css' rel='stylesheet' >
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Link to CSS stylesheet -->
        <link href="mainpage.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="title">
            <div class="row">
                <h1 class="col-md-12 text-center" id="homepagetitle"> Supermarket Database System </h1>
            </div>
        </div>
        
        <div class="login">
            <div class ="row">
                <form action="login_action.php" method="post">
                    <label><b>Employee ID: </b></label>
                    <input type="text" placeholder="Enter Employee ID" name="employeeID">
                    <br>
                    <label><b>Password: </b></label>
                    <input type="password" placeholder="Enter password" name="pwd">
                </form>
            </div>
        </div>


        <div class="phpStuff">
            <?php
                // put your code here
                $servername = "localhost";          //should be same for you
                $username = "root";                 //same here
                $password = "rootPass";             //your localhost root password
                $db = "supermarket";                     //your database name

                $conn = new mysqli($servername, $username, $password, $db);

                if($conn->connect_error){
                    die("Connection failed".$conn->connect_error);
                }else{
                    echo "Connected<br>";
                }

                //sql query
                $sql = "INSERT INTO names (names) VALUES ('John')";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query
                    echo "Query executed<br>";
                }
                else{
                    echo "Query did not execute<br>";
                }

                //sql query
                $sql = "SELECT names FROM names";
                echo "<br><br>Printing names in the (names) table in the (names) column:<br>";
                $result = $conn->query($sql);       //execute the query

                if($result->num_rows >0){           //check if query results in more than 0 rows
                    while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
                        echo "Name: ".$row["names"]."<br>"; //here we are looking at one row, and printing the value in "names" column
                    }
                }

                $conn-> close();            //close the connection to database
            ?>
        </div>
    </body>
</html>
