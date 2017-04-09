<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; supplier.php">
        <title>Supplier Removed</title>
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

        $name=$_POST["name"];

        if(empty($name)){
            echo "Error: The supplier name is empty";
        } else {
            $sql = "DELETE FROM supplier WHERE name='$name'";
        }

        if($conn->query($sql) === TRUE){
            echo "Supplier Removed";
        }

    ?>

    </body>
</html>