<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="3; customer_giveFeedback.php">
    <title>Feedback Added</title>
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

    $cid1=$_SESSION['id'];
    $pwd1=$_SESSION['pass_word'];
    $sql1 = "SELECT * FROM `customer` WHERE name = '$cid1' AND phone_num= '$pwd1'";
    $result = $conn -> query($sql1);
    $row= $result -> fetch_assoc();
    $cust_id1= $row["cid"];

    $dep_name1=$_POST["dep_name"];
    $rating1=$_POST["rating"];
    $feedback1=$_POST["feedback"];

    if(empty($dep_name1)) {
        echo "Error: Please select a department";
    } else if (empty($rating1)) {
        echo "Error: Please select a rating";
    } else if (empty($feedback1)) {
        echo "Error: Please type a comment";
    } else {
        $sql = "INSERT INTO `gives_feedback` (cust_id, dep_name, rating, feedback) VALUES ('$cust_id1', '$dep_name1', '$rating1', '$feedback1')";
    }

    if($conn->query($sql) === TRUE){
        echo "Feedback Given";
    }

    ?>
    </body>

</html>