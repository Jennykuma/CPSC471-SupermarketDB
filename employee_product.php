<!DOCTYPE html>
<html>
    <title>Supermarket Database System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            background-image: url('fruitsbg.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }

        #name {
            font-size: 60px;
        }

    </style>

    <body>

        <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
            <div class="w3-display-topleft w3-padding-large w3-xlarge" style="color: white";>
                Group 7
            </div>

            <!-- Header -->
            <header class=" w3-center">
                <div class="w3-padding-32">
                    <div class="w3-bar w3-border">
                        <a href="mainmenu_employee.php" class="w3-bar-item w3-button">Main Menu</a>
                        <a href="employee.php" class="w3-bar-item w3-button w3-light-grey">Employee List</a>
                        <a href="#" class="w3-bar-item w3-button">Shift Schedule</a>
                        <a href="#" class="w3-bar-item w3-button">Product Information</a>
                        <a href="#" class="w3-bar-item w3-button w3-hide-small">Supplier Information</a>
                    </div>
                </div>
                <div class="w3-padding-32">
                    <h1 class="w3-jumbo">Employees</h1>
                    <div class="w3-bar w3-border">
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

                        // SQL QUERY - GET PRODUCTS 
                        $sql = "SELECT * FROM employee";
                        $result = $conn->query($sql);

                        $sell = "SELECT department.dname, sells.dep_name, sells.prod_id, product.pid, product.name, product.price, product.sup_name, product.wholesale_price".
                                "FROM department, sells, product"

                        if ($result->num_rows > 0) {
                            echo "<table style='border: 1px solid white' border='1px'><tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Supplier</th><th>Wholesale Price/th></tr>";
                            // output data of each row
                            // echo department name

                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["pid"] . "</td>                // productID 
                                        <td>" . $row["name"] . "</td>               // productName
                                        <td>" . $row["price"] . "</td>              // productPrice
                                        <td>" . $row["sup_name"] . "</td>           // supplierName (employee only)
                                        <td>" . $row["wholesale_price"] . "</td>    // wholesalePrice (employee only)
                                      </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </header>
        </div>

        <!-- Add employee btn -->
        <div class="w3-display-bottommiddle w3-hover-opacity w3-container w3-xlarge" style="opacity: 0.8">
            <p><button onclick="document.getElementById('contact').style.display='block'" class="w3-button w3-white">Add Product</button></p>
        </div>

        <!-- Contact Modal -->
        <div id="contact" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Add Product</h1>
                </div>
                <div class="w3-container">
                    <p>To add an employee, please insert the following information below:</p>
                    <form action="employee_add.php" target="blank" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Product Name" required name="name"></p>     
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Price" required name="price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier Name" required name="sin"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Wholesale Price" required name="salary"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department" required name="prod_dep"></p>
                        <p><button class="w3-button" type="submit">ADD PRODUCT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>
</html>
