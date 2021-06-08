<?php
	session_start();
    include 'includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();
?>

<!DOCTYPE html>
<html lang=ro>
    <head>
        <title>Create a card!</title>
        <meta charset="UTF-8">
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Creator.css">
        <script type="text/javascript" src="js/creator.js"></script>
    </head>
    <body>
        <div class="antet">
            <header>
                <a href="index.php">
                    <img class="logo" src="images/logo.png" alt="Logo">
                </a>
                <a href="newcard.php" class="NewCard">New Card</a>
                <input class="Search" type="text" placeholder="Search...">
                <?php
                if(isset($_SESSION["username"])) {
                    echo "<a href='includes/logout.inc.php' class='SignUp'>Log out</a>";
                    echo "<a class='LogIn'>user: " . $_SESSION['username'] . "</a>"; 
                } else {
                    echo "<a href='signup.php' class='SignUp'>Sign up</a>";
                    echo "<a href='login.php' class='LogIn'>Log in</a>";
                }
				?>
            </header>
        </div>
        <div class="center">
            
            <div class="mainFrame">
                <div class="card">
                    <!-- <img id="frame"/> -->
                    <canvas class="canvas" id="canvas"></canvas>
                    <!-- <img src="https://cdn.shopify.com/s/files/1/0222/9834/products/shutterstock_754419700_1024x1024.jpg?v=1588706826" alt="This is where the card goes"> -->
                </div>
            </div>
            
            <div id="picker" class="picker">

            </div>

            
            <div class="buttons">
                <a class="creatorButton" onclick="loadFrames()"><img src="images/frame.png" alt="Frames" ></a>
                <a class="creatorButton" onclick="loadStickers()"><img src="images/image.png" alt="Photos"></a>
                <a class="creatorButton" onclick="AddText()"><img src="images/text.png" alt="Text"> </a>
                <a class="creatorButton" onclick="loadBackgrounds()"><img src="images/background.png" alt="Backgrounds"></a>
                <a href="publish.php" class="creatorButton" id="pubprivate">Publish as private</a>
                <a class="creatorButton" id="pubcommunity">Publish to comunity</a>
            </div>

            <script>
                function AddText() {
                    var canvas = document.getElementById("canvas");
                    var text = prompt("Please enter your text", "");
                    var ctx = canvas.getContext("2d");
                    ctx.font = "30px Calibri";
                    if (text != null) {
  	                    ctx.strokeText(text,10,50);
                    }
                }

                function loadFrames() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("picker").innerHTML = this.responseText;
                            //console.log(this.responseText);
                        }
                    };
                    xhttp.open("GET", "ajax/frames.php", true);
                    xhttp.responseType = "text";
                    xhttp.send();
                }

                function loadStickers() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("picker").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "ajax/stickers.php", true);
                    xhttp.responseType = "text";
                    xhttp.send();
                }

                function loadBackgrounds() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("picker").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "ajax/backgrounds.php", true);
                    xhttp.responseType = "text";
                    xhttp.send();
                }
            </script>   
        </div>
    </body>
</html>