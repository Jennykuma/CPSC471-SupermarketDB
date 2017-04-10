<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="2; shift.php">
    <title>Shift Updated</title>
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

        $shift_num=$_POST["shift_num1"];
        $date=$_POST["date1"];
        $start_time=$_POST["start_time1"];
        $end_time=$_POST["end_time1"];
        $emp_id=$_POST["emp_id1"];
        $dep_name=$_POST["dep_name1"];

    /*if (strlen($phone_num) != 10 && !empty($phone_num)){
        echo "Invalid phone number";
    }else {*/

        $sql = "UPDATE shift SET ";
        if (!empty($date)) {
            $sql = $sql . "date = '$date', ";
        }
        if (!empty($start_time)) {
            $sql = $sql . "start_time = '$start_time', ";
        }
        if (!empty($end_time)) {
            $sql = $sql . "end_time = '$end_time', ";
        }
        if (!empty($emp_id)) {
            $sql = $sql . "emp_id = '$emp_id', ";
        }
        if (!empty($dep_name)) {
            $sql = $sql . "dep_name = '$dep_name', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = $sql. " WHERE shift_num = '$shift_num'";

        if($conn->query($sql) === TRUE){
            echo "Shift Updated";
        }

    ?>

</body>
</html>
