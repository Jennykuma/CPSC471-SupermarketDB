<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; shift.php">
        <title>Shift Removed</title>
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

        $shift_num=$_POST["shift_num"];

        if(empty($shift_num)){
            echo "Error: The shift number is empty";
        } else {
            $sql = "DELETE FROM shift WHERE ($shift_num=shift_num)";
        }

        if($conn->query($sql) === TRUE){
            echo "Shift Removed";
        }

    ?>

    </body>
</html>