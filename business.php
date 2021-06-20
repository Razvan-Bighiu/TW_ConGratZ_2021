<?php
	session_start();
	include 'includes/galerie.inc.php';
	// Conectare la baza de date cu galeria
	$pdo = pdo_connect_mysql();
?>

<!DOCTYPE html>
    <html lang="ro"> 
    <head>
        <title>Create a business card!</title>
        <meta charset="UTF-8">
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/business.css">
        <link rel="stylesheet" href="css/footer.css">
        <script type="text/javascript" src="js/creator.js"></script>
    </head>
        <body>
        <!-- De aici incepe header-ul -->
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
    	<!-- Aici se termina header-ul-->

        <!-- Main Frame-->
        <div class="center">
            <div class="mainFrame">
                <div id="card" class="card" style="width:500px;height:500px;">
                     <!-- <img id="frame"/> -->
                    <!-- <canvas class="canvas" id="canvas"></canvas> -->
                    <canvas id="hiddenCanvas" style="display:none" width="500" height="500"></canvas>
                    <!-- <img src="https://cdn.shopify.com/s/files/1/0222/9834/products/shutterstock_754419700_1024x1024.jpg?v=1588706826" alt="This is where the card goes"/> -->
                </div>
            </div>
            
            <div class="backgrounds">
                
            </div>

            <div class="writer">
                <form method="POST">
                    <input type="text" name="name" placeholder="Name" Required>
                    <br/>
                    <input type="email" name="email" placeholder="Email" Required>
                    <br/>
                    <input type="tel" name="phone" placeholder="Phone nr." Required>
                    <br/>
                    <input type="text" name="adress" placeholder="Adress" Required>
                    <br/>
                    <input type="submit" name="submit" class= "submit" value="Submit">
                    <br/>
                    <button class="IXML" type="button" name="Download">Import XML</button>
                    <br/>
                    <button class="PDF" type="button" name="Download">Export PDF</button>
                    <br/>
                    <button class="QRC" type="button" name="Download">QR Code</button>
                </form>
            </div>
            
            </div>
        <!-- Main Frame-->
    </body>
</html>
