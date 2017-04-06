<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="4; employee_product.php">
        <title>Product Removed</title>
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

        $pid=$_POST["pid"];

        if(empty($pid)){
            echo "Error: The product id is empty";
        } else {
            $sql = "DELETE FROM product WHERE ($pid=pid)";
        }

        if($conn->query($sql) === TRUE){
            echo "Product Removed";
        }

    ?>

    </body>
</html>