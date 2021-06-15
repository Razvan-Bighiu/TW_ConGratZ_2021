<?php
	session_start();
	include 'includes/galerie.inc.php';
	// Connect to MySQL
	$pdo = pdo_connect_mysql();
	// MySQL query that selects all the images
	//$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
	//$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ro">
	<head>
		<meta charset="UTF-8">
		<title>Card View</title>
        <link rel="icon" href="images/logo.png" type="image/x-icon">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/CardView.css">
		<link rel="stylesheet" href="css/ImagePOPUp.css">
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
					<form class="search-form" method="get" style="display: inline-flex" action="./index.php">
						<input class="Search" name="search" type="text" placeholder="Search..." style="display: inline-table">
					</form>
					
                    <?php
                        if(isset($_SESSION["username"])) {
                            echo "<a href='includes/logout.inc.php' class='SignUp'>Log out</a>";
                            echo "<a class='LogIn'>user: " . $_SESSION['username'] . "</a>"; 
                        } else {
                            echo "<a href='signup.php' class='SignUp'>Sign up</a>";
                            echo "<a href='login.php' class='LogIn'>Log in</a>";
                        }
                    ?>

					<?php
						if (isset($_GET['id'])) {
							$stmt = $pdo->prepare("SELECT * FROM images where id = ?");
							$stmt->execute([$_GET['id']]);
							$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
							$image = $images[0];
						}
					?>
                </header>
            </div>
    	<!-- Aici se termina header-ul-->
		<div class="continut">
			<div class="sectiuneImagine">
				<div class="card" id="card">
					<img src="images/congratz.jpg" alt="Felicitare">
				</div>
				<div class="butoane">
					<a class="distribuie" href="">Distribuie</a>
					<button class="Download" type="button" name="Download">Download</button>
				</div>
			</div>
			<div class="sectiuneText">
				<div class="text" id="cvtext">
					<p>Felicitare</p>
				</div>
				<div class="user" id="cvuser">
					<p>Creator: Popescu Ion</p>
				</div>
				<div class="descriere" id="cvdesc">
					<p>Descriere: Aceasta este o felicitare pentru zile de nastere.</p>
				</div>
			</div>
		</div>
		<script>
			document.getElementById('cvtext').innerHTML = "<?php echo $image['title'] ?>";
			document.getElementById('cvuser').innerHTML = "<?php echo $image['creator'] ?>";
			document.getElementById('cvdesc').innerHTML = "<?php echo $image['description'] ?>";
			document.getElementById('card').innerHTML = '<?php echo $image['card'] ?>';
		</script>
	<div class="footer">
		<div class="documentation">
			<a href="documentation/Documentation.html" class="Documentation">Documentation</a>
		</div>
	</div>
	</body>
</html>