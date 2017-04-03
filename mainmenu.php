<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Supermarket Database System</title>

        <!-- Font from https://fonts.google.com/ -->
        <link href="https://fonts.googleapis.com/css?family=Happy+Monkey" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' type='text/css' rel='stylesheet' >
        <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,700' type='text/css' rel='stylesheet' >
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Link to CSS stylesheet -->
        <link href="mainmenu.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <div class="header">
            <div class="row">
                <h1 class="col-md-12 text-center" id="welcomemsg"> Welcome <?php session_start(); echo $_SESSION["employee_id"]; ?> </h1>
            </div>
        </div>

        <div class="picture">
            <img src="mainmenubanner.jpg">
        </div>

        <div class="container">
            <div class="row">
                <h1 class="col-md-6" id="linksHeader"> Links : </h1>
                <ul class="col-md-6" id="linksList" style="list-style-type:none">
                    <div class="button">
                        <li><button type="submit" id="button1">My Shift</button></li>
                        <li><button type="submit" id="button1">Inventory</button></li>
                    </div>
                </ul>
            </div>
        </div>
    </body>
</html>