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
                        <a href="shift.php" class="w3-bar-item w3-button">Shift Schedule</a>
                        <a href="employee_product.php" class="w3-bar-item w3-button">Product Information</a>
                        <a href="supplier.php" class="w3-bar-item w3-button w3-hide-small">Supplier Information</a>
                        <a href="transaction.php" class="w3-bar-item w3-button w3-hide-small">Transaction History</a>
                        <a href="employee_feedback.php" class="w3-bar-item w3-button w3-hide-small">Customer Feedback</a>
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

                        // SQL QUERY
                        $sql = "SELECT * FROM employee";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table style='border: 1px solid white' border='1px'><tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Title</th>
            <th>Department Name</th><th>Supervisor ID</th></tr>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["eid"] . "</td>
                                        <td>" . $row["fname"] . "</td>
                                        <td>" . $row["lname"] . "</td>
                                        <td>" . $row["phone_num"] . "</td>
                                        <td>" . $row["title"] . "</td>
                                        <td>" . $row["dep_name"] . "</td>
                                        <td>" . $row["super_id"] . "</td>
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
            <p><button onclick="document.getElementById('add').style.display='block'" class="w3-button w3-white">Add Employee</button>
                <button onclick="document.getElementById('delete').style.display='block'" class="w3-button w3-white">Delete Employee</button>
                <button onclick="document.getElementById('update').style.display='block'" class="w3-button w3-white">Update Employee</button>
            </
            </p>
        </div>

        <!-- Add Modal -->
        <div id="add" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('add').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Add Employee</h1>
                </div>
                <div class="w3-container">
                    <p>To add an employee, please insert the following information below:</p>
                    <form action="employee_add.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="First Name" required name="fname"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Last Name" required name="lname"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="SIN" required name="sin"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Salary" required name="salary"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Phone Number" required name="phone_num"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Title" required name="title"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department Name" required name="dep_name"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supervisor ID" required name="super_id"></p>
                        <p><button class="w3-button" type="submit">ADD EMPLOYEE</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('delete').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Remove Employee</h1>
                </div>
                <div class="w3-container">
                    <p>To remove an employee, please insert the following information below:</p>
                    <form action="employee_remove.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Employee ID" required name="eid"></p>
                        <p><button class="w3-button" type="submit">REMOVE EMPLOYEE</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div id="update" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('update').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Update Employee</h1>
                </div>
                <div class="w3-container">
                    <p>To update an employee, please insert the following information below:</p>
                    <form action="employee_update.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Employee ID"  name="eid1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="First Name"  name="fname1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Last Name"  name="lname1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Salary"  name="salary1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Phone Number"  name="phone_num1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Title"  name="title1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department Name"  name="dep_name1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Supervisor ID"  name="super_id1"></p>
                        <p><button class="w3-button" type="submit">UPDATE EMPLOYEE</button></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>
</html>
