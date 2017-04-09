<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; shift.php">
        <title>Shift Added</title>
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

        $date1=$_POST["date"];
        $start_time1=$_POST["start_time"];
        $end_time1=$_POST["end_time"];
        $emp_id1=$_POST["emp_id"];
        $dep_name1=$_POST["dep_name"];

        if(empty($date1) || empty($start_time1) || empty($end_time1) || empty($emp_id1)){
            echo "Error: One or more of the required fields are empty";
        }   // TODO: Add format checking for date and times 
        /*else if (strlen($super_id1) != 8){
            echo "Invalid supervisor ID";
        } else if (strlen($phone_num1) != 10){
            echo "Invalid phone number";
        }*/ else {
            $sql = "INSERT INTO shift (date, start_time, end_time, emp_id, dep_name) VALUES ($date1, $start_time1, $end_time1, $emp_id1, $dep_name1)";
        }

        if($conn->query($sql) === TRUE){
            echo "Shift Added";
        }

        ?>

</body>

</html>