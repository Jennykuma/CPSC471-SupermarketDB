<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; employee.php">
        <title>Employee Added</title>
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

        $fname1=$_POST["fname"];
        $lname1=$_POST["lname"];
        $sin1=$_POST["sin"];
        $salary1=$_POST["salary"];
        $phone_num1=$_POST["phone_num"];
        $title1=$_POST["title"];
        $dep_name1=$_POST["dep_name"];
        $super_id1=$_POST["super_id"];

        if(empty($fname1) || empty($lname1) || empty($sin1)){
            echo "Error: One or more of the required fields are empty";
        } else if (strlen($super_id1) != 8){
            echo "Invalid supervisor ID";
        } else if (strlen($phone_num1) != 10){
            echo "Invalid phone number";
        } else {
            $sql = "INSERT INTO employee (fname, lname, sin, title, salary, phone_num, dep_name, super_id) VALUES ('$fname1', '$lname1', '$sin1', '$title1', '$salary1', '$phone_num1', '$dep_name1', '$super_id1')";
        }

        if($conn->query($sql) === TRUE){
            echo "Employee Added";
        }

        ?>

</body>

</html>