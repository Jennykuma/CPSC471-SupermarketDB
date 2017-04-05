<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; employee.php">
        <title>Employee Removed</title>
    </head>

    <body>
        <?php

        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "rootPass";
        $db = "supermarket";

        $conn = new mysqli($servername, $username, $password, $db);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $eid=$_POST["eid"];

        if(empty($eid)){
            echo "Error: The employee id is empty";
        } else {
            $sql = "DELETE FROM employee WHERE ($eid=eid)";
        }

        if($conn->query($sql) === TRUE){
            echo "Employee Removed";
        }

    ?>

    </body>
</html>