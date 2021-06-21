<?php
	session_start();
	include 'includes/galerie.inc.php';
	// Conectare la baza de date cu galeria
	$pdo = pdo_connect_mysql();
	// Afiseaza imaginile in ordine descrescatoare
	$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
	$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
					<form class="search-form" method="get" style="display: inline-flex">
						<input class="Search" name="search" type="text" placeholder="Search..." style="display: inline-table">
					</form>
					<?php
						if (isset($_GET['search'])) {
							$search = $_GET['search'];
							$stmt = $pdo->query("SELECT * FROM images WHERE title LIKE '%$search%'");
							$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
						}
					?>
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

		<!-- De aici incepe galeria -->
		<div class="menu">
			<form method="get" action="includes/sortare.inc.php">
				<select id="sort-select" name="sortBy">
					<option value="desc">Newest</option>
					<option value="asc">Oldest</option>
				</select>
				<button type="submit">Sort</button>
			</form>

			<?php
				if (isset($_GET['info']) && $_GET['info'] == 'desc') {
					$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
					$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else if (isset($_GET['info']) && $_GET['info'] == 'asc') {
					$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date ASC');
					$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			?>
		</div>
		<div class="content home">
			<div class="images">
				<?php foreach ($images as $image): ?>
				<?php if (isset($image['path'])): ?>
				<a href="#">
					<img src=<?=$image['path']?> alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>" data-creator="<?=$image['creator']?>" width="300" height="200">
					<span><?=$image['description']?></span>
				</a>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="image-popup">
			<script>
				// Container we'll use to show an image
				let image_popup = document.querySelector('.image-popup');
				// Loop each image so we can add the on click event
				document.querySelectorAll('.images a').forEach(img_link => {
					img_link.onclick = click => {
						click.preventDefault();
						let img_meta = img_link.querySelector('img');
						let img = new Image();
						img.onload = () => {
							// Create the pop out image
							image_popup.innerHTML = `
								<div class="con">
									<div class="continut">
										<div class="sectiuneImagine">
											<div class="imagine">
											<a href="./cardviewer.php?id=${img_meta.dataset.id}">
												<img src="${img.src}">
											</a>
											</div>
											<div class="butoane">
												<a class="distribuie" type="button" name="CopyLink" href="${img.src}">Copy Link</a>
												<a class="Download" type="button" name="Download" href="${img.src}" download="${img.src}">Download</a>
											</div>
										</div>
										<div class="sectiuneText">
											<div class="text">
												<h1>${img_meta.dataset.title}</h1>
											</div>
											
											<div class="user">
												by: ${img_meta.dataset.creator}
											</div>

											<div class="descriere">
												Descriere: <p>${img_meta.alt}</p>
											</div>
										</div>
										</div>
									</div>
								`;
							image_popup.style.display = 'flex';
						};
						img.src = img_meta.src;
					};
				});
				// Hide the image popup container if user clicks outside the image
				image_popup.onclick = click => {
					if (click.target.className == 'image-popup') {
						image_popup.style.display = "none";
					}
				};
			</script>
		</div>
		<!-- Aici se termina galeria -->

		<!-- De aici incepe footer-ul -->
		<div class="footer">
			<div class="documentation">
				<a href="documentation/Documentation.html" class="Documentation">Documentation</a>
			</div>
		</div>
		<!-- Aici se termina footer-ul -->
    </body>
</html>