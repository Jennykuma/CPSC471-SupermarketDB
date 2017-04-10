<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; employee_product.php">
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
            // Check if pid exists
            $pidcheck = "SELECT pid FROM product WHERE pid = '$pid' ";
            $check = $conn -> query($pidcheck);

            if ($check->num_rows > 0){
                $sql = "DELETE FROM product WHERE ($pid=pid)";
            }else{
                echo "Invalid Product ID";
            }


            
        }

        if($conn->query($sql) === TRUE){
            echo "Product Removed";
        }

    ?>

    </body>
</html>