<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="2; supplier.php">
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

    $name=$_POST["name1"];
    $phone_num=$_POST["phone_num1"];
    $address=$_POST["address1"];


    if (strlen($phone_num) != 10 && !empty($phone_num)){
        echo "Invalid phone number";
    }else {

        $sql = "UPDATE supplier SET ";
        if (!empty($name)) {
            $sql = $sql . "name = '$name', ";
        }
        if (!empty($phone_num)) {
            $sql = $sql . "phone_num = '$phone_num', ";
        }
        if (!empty($address)) {
            $sql = $sql . "address = '$address', ";
        }
        if (!empty($phone_num)) {
            $sql = $sql . "phone_num = '$phone_num', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = $sql. " WHERE name = '$name'";

        if($conn->query($sql) === TRUE){
            echo "Supplier Updated";
        }
    }

    ?>

</body>
</html>