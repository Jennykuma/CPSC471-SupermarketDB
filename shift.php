<!DOCTYPE html>

<html>
    <meta charset="UTF-8">
    <title>Shift Schedule</title>
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
                        <a href="employee.php" class="w3-bar-item">Employee List</a>
                        <a href="shift.php" class="w3-bar-item w3-button w3-light-grey">Shift Schedule</a>
                        <a href="employee_product.php" class="w3-bar-item w3-button">Product Information</a>
                        <a href="supplier.php" class="w3-bar-item w3-button w3-hide-small">Supplier Information</a>
                    </div>
                </div>
                <div class="w3-padding-32">
                    <h1 class="w3-jumbo">Shift Schedules</h1>
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
                        $sql = "SELECT * FROM shift";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table style='border: 1px solid white' border='1px'><tr><th>Shift Number</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Employee ID</th>
            <th>Department Name</th></tr>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["shift_num"] . "</td>
                                        <td>" . $row["date"] . "</td>
                                        <td>" . $row["start_time"] . "</td>
                                        <td>" . $row["end_time"] . "</td>
                                        <td>" . $row["emp_id"] . "</td>
                                        <td>" . $row["dep_name"] . "</td>
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

        <!-- Add shift btn -->
        <div class="w3-display-bottommiddle w3-hover-opacity w3-container w3-xlarge" style="opacity: 0.8">
            <p><button onclick="document.getElementById('add').style.display='block'" class="w3-button w3-white">Add Shift</button>
                <button onclick="document.getElementById('delete').style.display='block'" class="w3-button w3-white">Delete Shift</button>
                <button onclick="document.getElementById('update').style.display='block'" class="w3-button w3-white">Update Shift</button>
            </
            </p>
        </div>

        <!-- Add Modal -->
        <div id="add" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('add').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Add Shift</h1>
                </div>
                <div class="w3-container">
                    <p>To add a shift, please insert the following information below:</p>
                    <form action="shift_add.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Date" required name="date"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Start Time" required name="start_time"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="End Time" required name="end_time"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Employee ID" required name="emp_id"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department Name" required name="dep_name"></p>
                        <p><button class="w3-button" type="submit">ADD SHIFT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('delete').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Remove Shift</h1>
                </div>
                <div class="w3-container">
                    <p>To remove a shift, please insert the following information below:</p>
                    <form action="employee_remove.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Shift Number" required name="shift_num"></p>
                        <p><button class="w3-button" type="submit">REMOVE SHIFT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div id="update" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black">
                    <span onclick="document.getElementById('update').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Update Shift</h1>
                </div>
                <div class="w3-container">
                    <p>To update a shift, please insert the following information below:</p>
                    <form action="employee_update.php" target="_self" method="post">
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Shift Number" required name="shift_num1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Date" required name="date1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Start Time" required name="start_time1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="End Time" required name="end_time1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Employee ID" required name="emp_id1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" placeholder="Department Name" required name="dep_name1"></p>
                        <p><button class="w3-button" type="submit">UPDATE SHIFT</button></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>

</html>