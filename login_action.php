<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Redirect</title>
    </head>

    <body>
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
        $id = $_POST["employeeID"];
        $password = $_POST["pwd"];
        $_SESSION['employee_id'] = $id;
        $_SESSION['pass_word'] = $password;
        $sql = "SELECT eid FROM `employee` WHERE eid = '$id' AND phone_num = '$password'";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        if($row > 0){
            echo "Login successful: Redirecting...";
            echo "<meta http-equiv=\"Refresh\" content=\"2; mainmenu_employee.php\">";
        }else{
            echo "Login error: Redirecting...";
            echo "<meta http-equiv=\"Refresh\" content=\"2; mainpage.php\">";
        }

        $sql2 = "SELECT fname FROM `employee` WHERE eid=$id";
        $result2 = $conn -> query($sql2);

        $row = $result2 -> fetch_assoc();
        $_SESSION['employee_id'] = $row["fname"];

        ?>
    </body>

</html>