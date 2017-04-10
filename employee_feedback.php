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
                        <a href="employee_product.php" class="w3-bar-item w3-button w3-hide-small">Product Information</a>
                        <a href="supplier.php" class="w3-bar-item w3-button w3-hide-small">Supplier Information</a>
                        <a href="transaction.php" class="w3-bar-item w3-button w3-hide-small">Transaction History</a>
                        <a href="transaction.php" class="w3-bar-item w3-button w3-light-grey">Customer Feedback</a>
                    </div>
                </div>
                <div class="w3-padding-32">
                    <h1 class="w3-jumbo">Customer Feedback</h1>
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


                        <?php

                        // SQL QUERY
                        $sql = "SELECT * FROM gives_feedback";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table style='border: 1px solid white' border='1px'><tr><th>Customer ID</th><th>Department</th><th>Rating</th><th>Feedback</th></tr>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["cust_id"] . "</td>
                                        <td>" . $row["dep_name"] . "</td>
                                        <td>" . $row["rating"] . "</td>
                                        <td>" . $row["feedback"] . "</td>
                                      </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "There is no feedback given yet.";
                        }


                        $conn->close();
                        ?>
                    </div>
                </div>
            </header>
        </div>


        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>
</html>
