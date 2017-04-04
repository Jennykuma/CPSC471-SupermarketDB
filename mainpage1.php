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
            background-image: url('supermarketbg.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }

        .transbox {
            background-color: #ffffff;
            opacity: 1.0;
            filter: alpha(opacity=100); /* For IE8 and earlier */
        }

        #loginForm {
            margin-top: 0px;
        }

        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: white;
        }

        input[type=text], input[type=password], input:focus {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            color: white;
            background-color: #87A330;
            opacity: 0.9;
        }

        #loginButton {
            position: relative;
            background-color: #dfdcb4;
            color: white;
            padding: 14px 20px;
            margin: 8px 0px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        #loginButton:hover {
            opacity: 0.6;
        }

    </style>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-large w3-xlarge" style="color: white";>
        Group 7
    </div>

    <div class="transbox">
        <!--
        <div class="w3-display-topmiddle w3-jumbo w3-padding-large" style="width: 100%;text-align: center;
        margin-top:10%;color: #424242">
            Supermarket Database System
        </div>
        -->


        <div class="w3-display-middle">

            <h1 class="w3-jumbo w3-animate-top" style="color: #424242">Supermarket Database System</h1>

            <!-- Separator -->
            <hr class="w3-border-grey" style="margin:auto;width:70%;">
            <form action="login_action.php" method="post" style="color: #424242" id="loginForm">
                <label><b>ID: </b></label>
                <input type="text" placeholder="Enter ID" name="employeeID">
                <br>
                <label><b>Password: </b></label>
                <input type="password" placeholder="Enter password" name="pwd">

                <div class="row">
                    <button type="submit" id="loginButton">Log In</button>
                </div>
                <!-- Separator -->
            <hr class="w3-border-grey" style="margin:auto;width:70%;">
            <p class="w3-large w3-center">"The best database system ever"</p>
        </div>
    </div>


    <div class="w3-display-bottomleft w3-padding-large">
        Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
    </div>
</div>

</body>
</html>
