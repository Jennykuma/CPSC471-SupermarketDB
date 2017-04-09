<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="4; employee_product.php">
        <title>Product Added</title>
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
        $price1=$_POST["price"];
        $sup_name1=$_POST["sup_name"];
        $wholesale_price1=$_POST["wholesale_price"];
        $phonenum1=$_POST["phonenum"];
        $address1=$_POST["address"];


        if(empty($name1) || empty($price1) || empty($sup_name1) || empty($wholesale_price1)){
            echo "Error: One or more of the required fields are empty";
        }else if (strlen($phonenum1) != 10){
            echo "Invalid phone number";
        }else{
            $supcheck = "SELECT supplier.name FROM supplier WHERE supplier.name = '$sup_name1' ";
            $check = $conn -> query($supcheck);

            if ($check->num_rows > 0){
                // Don't have to add supplier because supplier exists
                $sql = "INSERT INTO product (name, price, sup_name, wholesale_price) VALUES ('$name1', '$price1', '$sup_name1', '$wholesale_price1')";
            }else{
                $tosup = "INSERT INTO supplier (name, phone_num, address) VALUES ('$sup_name1', '$phonenum1', '$address')";
                $sql = "INSERT INTO product (name, price, sup_name, wholesale_price) VALUES ('$name1', '$price1', '$sup_name1', '$wholesale_price1')";
                if($conn->query($tosup) === TRUE){
                    echo "Supplier Added\n";
                }else{
                    echo "Supplier unable to be added";
                }   

            }
        }

        if($conn->query($sql) === TRUE){
                    echo "Product Added\r\n";
        }else{
            echo "Product unable to be added";
        }   
        ?>

</body>

</html>