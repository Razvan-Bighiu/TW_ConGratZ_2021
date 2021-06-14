<?php
	session_start();
	include 'includes/galerie.inc.php';
	// Conectare la baza de date cu galeria
	$pdo = pdo_connect_mysql();
?>

<!DOCTYPE html>
    <html lang="ro"> 
        <head>
            <title>CardView</title>
            <meta charset="utf-8" />
            <link rel="icon" href="images/logo.png" type="image/x-icon">
			<link rel="stylesheet" href="css/reset.css">
			<link rel="stylesheet" href="css/header.css">
            <link rel="stylesheet" href="css/index.css">
			<link rel="stylesheet" href="css/footer.css">
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

		<!-- De aici incepe footer-ul -->
		<div class="footer">
			<div class="documentation">
				<a href="documentation/Documentation.html" class="Documentation">Documentation</a>
			</div>
		</div>
		<!-- Aici se termina footer-ul -->
    </body>
</html>
