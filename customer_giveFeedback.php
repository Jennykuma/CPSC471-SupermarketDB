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
                <a href="mainmenu_customer.php" class="w3-bar-item w3-button">Main Menu</a>
                <a href="customer_product.php" class="w3-bar-item w3-button">Product Information</a>
                <a href="customer_giveFeedback.php" class="w3-bar-item w3-button w3-hide-small w3-light-grey">Give Feedback</a>
            </div>
        </div>
        <div class="w3-padding-32">
            <h1 class="w3-jumbo">Give Feedback</h1>

            <form action="feedback_add.php" method="post">
                Department <input type="text" name="dep_name"><br>
                <p></p>
                Rating (1 worsts - 10 best): <input type="text" name="rating"><br>
                <p></p>
                Feedback: <input type="text" name="feedback"><br>
                <p></p>
                <input type="submit">
            </form>

        </div>
    </header>
</div>



<div class="w3-display-bottomleft w3-padding-large" style="color: white">
    Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
</div>

</body>
</html>
