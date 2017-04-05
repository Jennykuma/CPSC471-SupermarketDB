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
        $id = $_POST["id"];
        $password = $_POST["pwd"];
        $_SESSION['id'] = $id;
        $_SESSION['pass_word'] = $password;
        $sql = "SELECT eid FROM `employee` WHERE eid = '$id' AND phone_num = '$password'";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        if($row > 0){
            $sql2 = "SELECT fname FROM `employee` WHERE eid=$id";
            $result2 = $conn -> query($sql2);

            $row = $result2 -> fetch_assoc();
            $_SESSION['id'] = $row["fname"];
            echo "Login successful: Redirecting...";
            echo "<meta http-equiv=\"Refresh\" content=\"2; mainmenu_employee.php\">";
        } else if($row == 0) {
            $sql3 = "SELECT cid FROM `customer` WHERE cid = '$id' AND phone_num = '$password'";
            $result3 = $conn -> query($sql3);
            $row2 = $result3 -> fetch_assoc();
            $sql4 = "SELECT name FROM `customer` WHERE cid=$id";
            $result4 = $conn -> query($sql4);

            $row4 = $result4 -> fetch_assoc();
            $_SESSION['id'] = $row4["name"];
            echo "Login successful: Redirecting...";
            echo "<meta http-equiv=\"Refresh\" content=\"2; mainmenu_customer.php\">";
        }else{
            echo "<meta http-equiv=\"Refresh\" content=\"2; mainpage.php\">";
        }

        ?>
    </body>

</html>