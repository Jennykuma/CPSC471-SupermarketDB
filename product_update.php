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

    $pid1=$_POST["pid1"];
    $name1=$_POST["name1"];
    $price1=$_POST["price1"];
    $sup_name1=$_POST["sup_name1"];
    $wholesale_price1=$_POST["wholesale_price1"];
    $department1=$_POST["department1"];
    $address1=$_POST["address1"];

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
            if($conn->query($sql) === TRUE){
                    echo "Name Updated\r\n";
                    echo "<br>";
                }
        }
        if (!empty($price1)) {
            $sql = "UPDATE product SET product.price = '$price1' WHERE product.pid = '$pid1' ";
            if($conn->query($sql) === TRUE){
                    echo "Price Updated\r\n";
                    echo "<br>";
                }
        }
        if (!empty($sup_name1)) {

            $supcheck = "SELECT supplier.name FROM supplier WHERE supplier.name = '$sup_name1' ";
            $check = $conn -> query($supcheck);

            if ($check->num_rows > 0){
                $sql = "UPDATE product SET product.sup_name = '$sup_name1' WHERE product.pid = '$pid1' ";
                if($conn->query($sql) === TRUE){
                    echo "Supplier Updated\r\n";
                    echo "<br>";
                }
            }else{
                echo "Supplier does not exist. Unable to update supplier";
                echo "<br>";
            }

        }
        if (!empty($department1)){

            $supcheck2 = "SELECT department.dname FROM department WHERE department.dname = '$department1' ";
            $check2 = $conn -> query($supcheck2);

            if ($check2->num_rows > 0){
                $sql = "UPDATE product SET product.department = '$department1' WHERE product.pid = '$pid1' ";
                if($conn->query($sql) === TRUE){
                    echo "Department Updated\r\n";
                    echo "<br>";
                }
            }else{
                echo "Department does not exist";
                echo "<br>";
            }
        }
        if (!empty($wholesale_price1)) {
            $sql = "UPDATE product SET product.wholesale_price = '$wholesale_price1' WHERE product.pid = '$pid1' ";
            if($conn->query($sql) === TRUE){
                echo "Wholesale Price Updated\r\n";
                echo "<br>";
            }
        }
        
    }

    ?>

</body>
</html>