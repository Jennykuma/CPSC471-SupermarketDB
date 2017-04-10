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
                        <a href="employee.php" class="w3-bar-item w3-button">Employee List</a>
                        <a href="shift.php" class="w3-bar-item w3-button">Shift Schedule</a>
                        <a href="employee_product.php" class="w3-bar-item w3-button w3-light-grey">Product Information</a>
                        <a href="supplier.php" class="w3-bar-item w3-button w3-hide-small">Supplier Information</a>
                    </div>
                </div>
                <div class="w3-padding-32">
                    <h1 class="w3-jumbo">Products</h1>
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
                        $dbLink=mysqli_connect("localhost","root","rootPass",$db);
                        ?>

                        <!-- F I L T E R  F O R M -->

                        <form name ="department1" action="" method="post">
                        <table>
                        <tr>
                        <td>Select Department</td>
                        <td><select id="departmentjs" onChange="change_department()">
                        <option value="selectNull">Select Department</option>
                        <option value="allProds">All Products</option>

                        <?php
                        $res=mysqli_query($dbLink,"select * from department");
     
                        while($row=mysqli_fetch_array($res))
                        {
                        ?>
                            <option value="<?php echo $row["dname"] ; ?>"><?php echo $row["dname"];?></option>

                        <?php
                        }
                        ?>
                        </select>
                        </td>
                        </tr>
                        </table>

                        <script type="text/javascript">
                        function change_department(){
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.open("GET", "ajax.php?department="+document.getElementById("departmentjs").value, false);
                            xmlhttp.send(null);
                            document.getElementById("prods").innerHTML=xmlhttp.responseText;
                        }
                        </script>

                        <div id="prods">
                        </div>

                        <?php
                        $conn->close();
                        ?>



                    </div>
                </div>
            </header>
        </div>

        <!-- Add product btn -->
        <div class="w3-display-bottommiddle w3-hover-opacity w3-container w3-xlarge" style="opacity: 0.8">
            <p><button onclick="document.getElementById('addprod').style.display='block'" class="w3-button w3-white">Add Product</button>
            <button onclick="document.getElementById('delete').style.display='block'" class="w3-button w3-white">Delete Product</button>
            <button onclick="document.getElementById('update').style.display='block'" class="w3-button w3-white">Update Product</button></p>
        </div>

        <!-- Add Modal -->
        <div id="addprod" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('addprod').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Add Product</h1>
                </div>
                <div class="w3-container">
                    <p>To add a product, please insert the following information below:</p>
                    <form action="product_add.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Product Name" required name="name"></p>     
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Price" required name="price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier Name" required name="sup_name"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Wholesale Price" required name="wholesale_price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department" required name="department"></p>
                        <p><button class="w3-button" type="submit">ADD PRODUCT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('delete').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Remove Product</h1>
                </div>
                <div class="w3-container">
                    <p>To remove a product, please insert the following information below:</p>
                    <form action="product_remove.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Product ID" required name="pid"></p>
                        <p><button class="w3-button" type="submit">REMOVE PRODUCT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div id="update" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('update').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Update Product</h1>
                </div>
                <div class="w3-container">
                    <p>To update a product, please insert the following information below:</p>
                    <form action="product_update.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Product ID*" required name="pid"></p> 
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Product Name" name="name"></p>     
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Price" name="price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier Name" name="sup_name"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Wholesale Price" name="wholesale_price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department" name="department"></p>
                        <p><button class="w3-button" type="submit">UPDATE PRODUCT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>
</html>
