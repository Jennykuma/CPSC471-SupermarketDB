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
                        <a href="employee.php" class="w3-bar-item w3-button w3-buttons">Employee List</a>
                        <a href="shift.php" class="w3-bar-item w3-button">Shift Schedule</a>
                        <a href="employee_product.php" class="w3-bar-item w3-button">Product Information</a>
                        <a href="supplier.php" class="w3-bar-item w3-button w3-light-grey">Supplier Information</a>
                    </div>
                </div>
                <div class="w3-padding-32">
                    <h1 class="w3-jumbo">Suppliers</h1>
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

                        // SQL QUERY
                        $sql = "SELECT * FROM supplier";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table style='border: 1px solid white' border='1px'><tr><th>Supplier Name</th><th>Phone Number</th><th>Address</th>
            </tr>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["phone_num"] . "</td>
                                        <td>" . $row["address"] . "</td>
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

        <!-- Add supplier btn -->
        <div class="w3-display-bottommiddle w3-hover-opacity w3-container w3-xlarge" style="opacity: 0.8">
            <p><button onclick="document.getElementById('add').style.display='block'" class="w3-button w3-white">Add Supplier</button>
                <button onclick="document.getElementById('delete').style.display='block'" class="w3-button w3-white">Delete Supplier</button>
                <button onclick="document.getElementById('update').style.display='block'" class="w3-button w3-white">Update Supplier</button>
            </
            </p>
        </div>

        <!-- Add Modal -->
        <div id="add" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('add').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Add Supplier</h1>
                </div>
                <div class="w3-container">
                    <p>To add a supplier, please insert the following information below:</p>
                    <form action="supplier_add.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Name" required name="name"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Phone Number" required name="phone_num"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Address" required name="address"></p>
                        <p><button class="w3-button" type="submit">ADD SUPPLIER</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('delete').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Remove Supplier</h1>
                </div>
                <div class="w3-container">
                    <p>To remove a supplier, please insert the following information below:</p>
                    <form action="supplier_remove.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supplier name" required name="name"></p>
                        <p><button class="w3-button" type="submit">REMOVE SUPPLIER</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div id="update" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('update').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Update Supplier</h1>
                </div>
                <div class="w3-container">
                    <p>To update a supplier, please insert the following information below:</p>
                    <form action="supplier_update.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Name"  name="name1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Phone Number"  name="phone_num1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Address"  name="address1"></p>
                        <p><button class="w3-button" type="submit">UPDATE SUPPLIER</button></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>
</html>
