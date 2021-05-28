<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ro">
	<head>
		<meta charset="UTF-8">
		<title>Card View</title>
		<link rel="stylesheet" type="text/css" href="css/CardView.css">
	</head>
	<body>
	<div class="antet">
		<header>
			<a href="index.html">
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
	<div class="continut">
		<div class="sectiuneImagine">
			<div class="imagine">
				<img src="images/congratz.jpg" alt="Felicitare">
			</div>
			<div class="butoane">
				<a class="distribuie" href="">Distribuie</a>
				<button class="Download" type="button" name="Download">Download</button>
			</div>
		</div>
		<div class="sectiuneText">
			<div class="text">
				<p>Felicitare</p>
			</div>
			<div class="user">
				<p>Creator: Popescu Ion</p>
			</div>
			<div class="descriere">
				<p>Descriere: Aceasta este o felicitare pentru zile de nastere.</p>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="documentation">
			<a href="documentation/Documentation.html" class="Documentation">Documentation</a>
		</div>
	</div>
	</body>
</html>