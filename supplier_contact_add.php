<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="2; supplier_contact.php">
    <title>Supplier Added</title>
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

    $name1=$_POST["name"];
    $phone_num1=$_POST["phone_num"];
    $address1=$_POST["address"];

    if(empty($name1)){
        echo "Error: Supplier name required!";
    } /*else if (strlen($super_id1) != 8){
                echo "Invalid supervisor ID";
            }*/ else if (strlen($phone_num1) != 10){
        echo "Invalid phone number";
    } else {
        $sql = "INSERT INTO supplier (name, phone_num, address) VALUES ('$name1', '$phone_num1', '$address1')";
    }

    if($conn->query($sql) === TRUE){
        echo "Supplier Pending Approval -> Result: Accepted";
    }

    ?>

    </body>

</html>