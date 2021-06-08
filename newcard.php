<?php
	session_start();
?>

<!DOCTYPE html>
<html lang=ro>
    <head>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Creator.css">
        <title>Create a card!</title>
        <?php
        include 'includes/galerie.inc.php';
                    $pdo = pdo_connect_mysql();
        ?>
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
            
            <div class="picker">
                <?php
                    $stmt = $pdo->query("SELECT * FROM frames");
                    $frames = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                    foreach($frames as $frame){
                        echo "<a onclick=\"changeFrame(".$frame['id'].")\">";
                        echo "<div class = \"pickerholder\">";
                        echo "<img src=".$frame['path'].">";
                        echo "</div>";
                        echo "</a>";
                    }
                ?>
            </div>

            
            <div class="buttons">
                <a class="creatorButton"><img src="images/frame.png" alt="Frames" ></a>
                <a class="creatorButton"><img src="images/image.png" alt="Photos"></a>
                <a class="creatorButton" onclick="AddText()"><img src="images/text.png" alt="Text"> </a>
                <a class="creatorButton"><img src="images/background.png" alt="Backgrounds"></a>
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
            </script>   
        </div>
    </body>
</html>