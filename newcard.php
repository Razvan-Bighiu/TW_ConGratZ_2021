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
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Creator.css">
        <link rel="stylesheet" href="css/footer.css">
        <script type="text/javascript" src="js/creator.js"></script>
    </head>
    <body>
        <div class="antet">
            <header>
                <a href="index.php">
                    <img class="logo" src="images/logo.png" alt="Logo">
                </a>
                <div class="dropdown">
                    <button class="dropbtn">New Card</button>
                    <div class="dropdown-content">
                        <a href="newcard.php">Greeting Card</a>
                        <a href="business.php">Business Card</a>
                    </div>
                </div>
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
                <div id="card" class="card">
                    <!-- <img id="frame"/> -->
                    <!-- <canvas class="canvas" id="canvas"></canvas> -->
                    <!-- <canvas id="hiddenCanvas" style="display:none" width="500" height="500"></canvas> -->
                    <!-- <img src="https://cdn.shopify.com/s/files/1/0222/9834/products/shutterstock_754419700_1024x1024.jpg?v=1588706826" alt="This is where the card goes"/> -->
                </div>
            </div>
            
            <div id="picker" class="picker">

            </div>
            
            <div class="buttons">
                <a class="creatorButton" onclick="loadFrames()"><img src="images/frame.png" alt="Frames" ></a>
                <a class="creatorButton" onclick="loadStickers()"><img src="images/image.png" alt="Photos"></a>
                <a class="creatorButton" onclick="AddText()"><img src="images/text.png" alt="Text"> </a>
                <a class="creatorButton" onclick="loadBackgrounds()"><img src="images/background.png" alt="Backgrounds"></a>
                <a href='publish.php' class="creatorButton" id="pubprivate" onclick="publish()">Publish!</a>
                <a class="creatorButton" id="pubcommunity">Publish to comunity</a>
            </div>

            <script>
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