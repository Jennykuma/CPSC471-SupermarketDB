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
                        <option> Select Dep</option>

                        <?php
                        $lst="SELECT dep_name from SELLS";
                        $res=mysqli_query($dbLink,"select * from sells");
     
                        while($row=mysqli_fetch_array($res))
                        {
                        ?>
                            <option value="<?php echo $row["dep_name"]; ?>"><?php echo $row["dep_name"];?></option>

                        <?php
                        }
                        ?>
                        </select>
                        </td>
                        </tr>

                        <tr></td>

                        </table>