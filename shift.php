<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Shift Schedule</title>
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

        //TODO: FINISH THE QUERY
        ?>
    </body>

</html>