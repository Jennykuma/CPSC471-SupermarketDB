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
        $department1=$_POST["department"];






        if(empty($name1) || empty($price1) || empty($sup_name1) || empty($wholesale_price1) || empty($department1)){
            echo "Error: One or more of the required fields are empty";
        }else{
            $supcheck = "SELECT * FROM supplier WHERE name = $sup_name1 ";
            $check = $conn -> query($supcheck);

            
            $supcheck2 = "SELECT * FROM department WHERE dname = $department1 ";
            $check2 = $conn -> query($supcheck2);

            if ($check->num_rows == 0){
                echo "Supplier does not exist";
            }else if ($check2->num_rows == 0){
                echo "Department does not exist";
            }else{
                $sql = "INSERT INTO product (name, price, sup_name, wholesale_price, department) VALUES ('$name1', '$price1', '$sup_name1', '$wholesale_price1', '$department1')";
                $conn->query($sql);
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