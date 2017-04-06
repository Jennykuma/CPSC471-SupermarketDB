<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="2; employee_product.php">
    <title>Product Updated</title>
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

    $pid1=$_POST["pid"];
    $name1=$_POST["name"];
    $price1=$_POST["price"];
    $sup_name1=$_POST["sup_name"];
    $wholesale_price1=$_POST["wholesale_price"];
    $phonenum1=$_POST["phonenum"];
    $address1=$_POST["address"];

    $prodcheck = "SELECT product.pid FROM product WHERE product.pid = '$pid1' ";
    $pidcheck = $conn -> query($prodcheck);  

    if ($pidcheck->num_rows < 1){
        echo "Invalid Product ID";
    }  

    if (strlen($phone_num) != 10 && !empty($phone_num)){
        echo "Invalid phone number";
    }else {
        if (!empty($name1)) {
            $sql = "UPDATE product SET product.name = '$name1' WHERE product.pid = '$pid1' ";
        }
        if (!empty($price1)) {
            $sql = "UPDATE product SET product.price = '$price1' WHERE product.pid = '$pid1' ";
        }
        if (!empty($sup_name1)) {

            $supcheck = "SELECT supplier.name FROM supplier WHERE supplier.name = '$sup_name1' ";
            $check = $conn -> query($supcheck);

            if ($check->num_rows > 0){
                $sql = "UPDATE product SET product.sup_name = '$sup_name1' WHERE product.pid = '$pid1' ";
            }else{
                echo "Supplier does not exist. Unable to update supplier";
            }

        }
        if (!empty($wholesale_price1)) {
            $sql = "UPDATE product SET product.wholesale_price = '$wholesale_price1' WHERE product.pid = '$pid1' ";
        }
        if($conn->query($sql) === TRUE){
            echo "Product Updated";
        }
    }

    ?>

</body>
</html>