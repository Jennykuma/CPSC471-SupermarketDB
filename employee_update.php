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

    $eid=$_POST["eid1"];
    $fname=$_POST["fname1"];
    $lname=$_POST["lname1"];
    $salary=$_POST["salary1"];
    $phone_num=$_POST["phone_num1"];
    $title=$_POST["title1"];
    $dep_name=$_POST["dep_name1"];
    $super_id=$_POST["super_id1"];

    if (strlen($phone_num) != 10 && !empty($phone_num)){
        echo "Invalid phone number";
    }else {

        $sql = "UPDATE employee SET ";
        if (!empty($fname)) {
            $sql = $sql . "fname = '$fname', ";
        }
        if (!empty($lname)) {
            $sql = $sql . "lname = '$lname', ";
        }
        if (!empty($salary)) {
            $sql = $sql . "salary = '$salary', ";
        }
        if (!empty($phone_num)) {
            $sql = $sql . "phone_num = '$phone_num', ";
        }
        if (!empty($title)) {
            $sql = $sql . "title = \"$title\", ";
        }

        if (!empty($dep_name)) {
            $sql = $sql . "dep_name = '$dep_name', ";
        }
        if (!empty($super_id)) {
            $sql = $sql . "super_id = '$super_id', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = $sql. " WHERE eid = '$eid'";

        if($conn->query($sql) === TRUE){
            echo "Employee Updated";
        }
    }

    ?>

</body>
</html>