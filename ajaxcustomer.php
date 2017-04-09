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
    $dbLink=mysqli_connect("localhost","root","rootPass",$db);

    $departmentx = $_GET["department"];

    if($departmentx == "selectNull"){
        echo "Please select a department";
    }
    else if($departmentx == "allProds"){
        // SQL GET LIST OF DEPARTMENTS FOR DROPDOWN LIST
        $dep_get = "SELECT dep_name FROM sells";
        $deps = $conn->query($dep_get);

        if ($deps->num_rows > 0) {
            echo "<table style='border: 1px solid white' border='1px'><tr><th>Department<th>Product ID</th><th>Product Name</th><th>Price</th></tr>";
            // output data of each row
            // echo department name

            $prod_get = "SELECT product.pid, product.name, product.price, product.sup_name, product.wholesale_price, sells.prod_id, sells.dep_name, product.department FROM product, sells WHERE sells.dep_name = product.department";
            $prod_list = $conn -> query($prod_get);

            while ($row = $prod_list->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["department"] . "</td>   
                        <td>" . $row["pid"] . "</td>               
                        <td>" . $row["name"] . "</td>              
                        <td>" . $row["price"] . "</td>             
                        </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }else{
        $res=mysqli_query($dbLink,"select * from sells");
        
        // SQL GET LIST OF DEPARTMENTS FOR DROPDOWN LIST
        $dep_get = "SELECT dep_name FROM sells";
        $deps = $conn->query($dep_get);

        if ($deps->num_rows > 0) {
            echo "<table style='border: 1px solid white' border='1px'><tr><th>Department</th><th>Product ID</th><th>Product Name</th><th>Price</th></tr>";
            // output data of each row
            // echo department name

            $prod_get = "SELECT product.pid, product.name, product.price, product.sup_name, product.wholesale_price, sells.prod_id, sells.dep_name, product.department FROM product, sells WHERE sells.dep_name='$departmentx'  AND product.department = sells.dep_name";
            $prod_list = $conn -> query($prod_get);

            while ($row = $prod_list->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["department"] . "</td> 
                        <td>" . $row["pid"] . "</td>               
                        <td>" . $row["name"] . "</td>              
                        <td>" . $row["price"] . "</td>             
                        </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

?>