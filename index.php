<?php
	session_start();
	include 'includes/galerie.inc.php';
	// Connect to MySQL
	$pdo = pdo_connect_mysql();
	// MySQL query that selects all the images
	$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
	$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
    <html lang="ro"> 
        <head>
            <title>CardView</title>
            <meta charset="utf-8" />
            <link rel="icon" href="images/logo.png" type="image/x-icon">
            <link rel="stylesheet" href="css/index.css">
			<link rel="stylesheet" href="css/CardView.css">
			<link rel="stylesheet" href="css/ImagePOPUp.css">
        </head>
        <body>
        <!-- De aici incepe header-ul -->
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
    	<!-- Aici se termina header-ul-->

		<!-- De aici incepe galeria -->
		<div class="menu">
			<button type="button" class="collection-filter__toolbar-controls__button">Sort</button>
			<select id="sort-select" class="collection-filter__sort-select-filter" name="sortBy">
				<option value="collections.relevancy:asc">Relevancy</option>
				<option value="date:desc">Newest</option>
				<option value="date:asc">Oldest</option>
				<option value="name.raw:asc">A - Z</option>
				<option value="reviews.likes:desc">Likes</option>
			</select>
		</div>
		<div class="content home">
			<div class="images">
				<?php foreach ($images as $image): ?>
				<?php if (file_exists($image['path'])): ?>
				<a href="#">
					<img src="<?=$image['path']?>" alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>" data-creator="<?=$image['creator']?>" width="300" height="200">
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
											<img src="${img.src}">
											</div>
											<div class="butoane">
												<a class="distribuie" href="">Distribuie</a>
												<button class="Download" type="button" name="Download">Download</button>
											</div>
										</div>
										<div class="sectiuneText">
											<div class="text">
												Titlu: <h1>${img_meta.dataset.title}</h1>
											</div>
											<div class="user">
												Creator: <p>${img_meta.dataset.creator}</p>
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