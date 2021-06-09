<?php
	session_start();
?>

<!DOCTYPE html>
<html lang=ro>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="images/logo.png" type="image/x-icon">
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
                <img id="cardImage" src="">
                </div>
            </div>
            <div class="cardData">
                <form>
                    <input type="text" id="cTitle" name="cTitle" placeholder="Title"><br>
                    <!--<input type="text" id="cDescription" name="cDescription">-->
                    <textarea name="cDescription" placeholder="Description"></textarea>
                </form>
                
            <a class="creatorButton">Publish</a>
            </div>
        </div>
        <div class="footer">
            <div class="documentation">
                <a href="documentation/Documentation.html" class="Documentation">Documentation</a>
            </div>
        </div>
                
        <script>
            document.getElementById("cardImage").src=sessionStorage.getItem('card');
        </script>
    </body>
</html>