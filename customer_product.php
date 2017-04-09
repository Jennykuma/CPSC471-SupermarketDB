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
                        <a href="employee_product.php" class="w3-bar-item w3-button w3-light-grey">Product Information</a>
                    </div>
                </div>
                <div class="w3-padding-32">
                    <h1 class="w3-jumbo">PRODUCTS</h1>
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
                        $res=mysqli_query($dbLink,"select * from sells");
     
                        while($row=mysqli_fetch_array($res))
                        {
                        ?>
                            <option value="<?php echo $row["dep_name"] ; ?>"><?php echo $row["dep_name"];?></option>

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
                            xmlhttp.open("GET", "ajaxcustomer.php?department="+document.getElementById("departmentjs").value, false);
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


        <div class="w3-display-bottomleft w3-padding-large" style="color: white">
            Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </div>

    </body>
</html>
