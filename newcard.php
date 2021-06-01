<?php
	session_start();
?>

<!DOCTYPE html>
<html lang=ro>
    <head>
        <link rel="stylesheet" href="css/Creator.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Create a card!</title>
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
                    <img src="https://cdn.shopify.com/s/files/1/0222/9834/products/shutterstock_754419700_1024x1024.jpg?v=1588706826" alt="This is where the card goes">
                </div>
            </div>
            
            <div class="picker">
                <div class="pickerholder">
                <img src="https://i.pinimg.com/originals/c2/4c/3b/c24c3b8b9736830196a12d19096b1c31.png" alt="frame 1">
                </div>
                
                <div class="pickerholder">
                <img src="https://5.imimg.com/data5/RR/GA/MY-9750351/photo-frame-500x500.jpg" alt="frame 2">
                </div>
                
                <div class="pickerholder">
                <img src="https://img.favpng.com/10/12/21/picture-frame-png-favpng-tSf1xnNvgyWtLXkHiLwM9dSdC.jpg" alt="frame 3">
                </div>
            </div>
            
            <div class="buttons">
                <a class="creatorButton"><img src="images/frame.png" alt="Frames"></a>
                <a class="creatorButton"><img src="images/image.png" alt="Photos"></a>
                <a class="creatorButton"><img src="images/text.png" alt="Text"> </a>
                <a class="creatorButton"><img src="images/background.png" alt="Backgrounds"></a>
                <a href="publish.php" class="creatorButton" id="pubprivate">Publish as private</a>
                <a class="creatorButton" id="pubcommunity">Publish to comunity</a>
            </div>
        </div>
        <div class="footer">
            <div class="documentation">
                <a href="documentation/Documentation.html" class="Documentation">Documentation</a>
            </div>
        </div>
    </body>
</html>