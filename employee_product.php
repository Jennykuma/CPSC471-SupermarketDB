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
                    <h1 class="w3-jumbo">PRODUCTS</h1>
                    <div class="w3-bar w3-border">



                        TABLE SHIT GOES HERE

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

                        //mysqli_select_db($conn,"try");
                        //$sql="SELECT * FROM sells,"





                        // SQL GET LIST OF DEPARTMENTS FOR DROPDOWN LIST
                        $dep_get = "SELECT dep_name FROM sells";
                        $deps = $conn->query($dep_get);
                        if ($deps->num_rows > 0){
                        //$select = mysql_query("Select Department");

                        
                        // POPULATE DROP DOWN LIST 
                        $asdf = '<select name="department_name" id="department_name">';
                        while($dep_list = $deps->fetch_assoc()){
                            $department_options .="<option>" .$dep_list['dep_name'] . "</option>";
                            }
                        
                        $options = "<form id='deps' name='deps' method='post' action =''>
                            <p><label>Select Department</label></p>
                                <select name='deps' id='deps'>
                                " . $department_options ."
                                </select>
                            </form>";
                        echo $options;
                        }else{
                            echo "No departments ";
                        }
                        //echo $_POST['deps'];

                        if ($deps->num_rows > 0) {
                            echo "<table style='border: 1px solid white' border='1px'><tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Supplier</th><th>Wholesale Price</th></tr>";
                            // output data of each row
                            // echo department name

                            $prod_get = "SELECT product.pid, product.name, product.price, product.sup_name, product.wholesale_price, sells.prod_id, sells.dep_name FROM product, sells WHERE sells.dep_name = 'Bakery' AND product.pid = sells.prod_id";
                            $prod_list = $conn -> query($prod_get);

                            while ($row = $prod_list->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["pid"] . "</td>               
                                        <td>" . $row["name"] . "</td>              
                                        <td>" . $row["price"] . "</td>             
                                        <td>" . $row["sup_name"] . "</td>          
                                        <td>" . $row["wholesale_price"] . "</td>    
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

        <!-- Add product btn -->
        <div class="w3-display-bottommiddle w3-hover-opacity w3-container w3-xlarge" style="opacity: 0.8">
            <p><button onclick="document.getElementById('contact').style.display='block'" class="w3-button w3-white">Add Product</button></p>
            <button onclick="document.getElementById('delete').style.display='block'" class="w3-button w3-white">Delete Product</button>
            <button onclick="document.getElementById('update').style.display='block'" class="w3-button w3-white">Update Product</button>
        </div>

        <!-- Contact Modal -->
        <div id="contact" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Add Product</h1>
                </div>
                <div class="w3-container">
                    <p>To add a product, please insert the following information below:</p>
                    <form action="product_add.php" target="blank" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Product Name" required name="name"></p>     
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Price" required name="price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier Name" required name="sup_name"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Wholesale Price" required name="wholesale_price"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier Phone Number" required name="phonenum"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier Address" required name="address"></p>
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
