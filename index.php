<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ro"> 
	<head>
		<title>ConGratZ</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="icon" href="images/logo.png" type="image/x-icon">
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <main> 
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

            <div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 1</h2>
					<p>by User1</p>
				</div>
			</div>
			  
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 2</h2>
					<p>by User2</p>
				</div>
			</div>
			
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 3</h2>
					<p>by User3</p>
				</div>
			</div>
			
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 4</h2>
					<p>by User4</p>
				</div>
			</div>
			
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 5</h2>
					<p>by User5</p>
				</div>
			</div>
			
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 6</h2>
					<p>by User6</p>
				</div>
			</div>
			
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 7</h2>
					<p>by User7</p>
				</div>
			</div>
			
			<div class="resp">
				<div>
					<a href="cardviewer.php">
                    	<img src="images/card-mock.png" alt="Card" width="350" height="260">
               		</a>
				</div>
				<div>
					<h2>Card 8</h2>
					<p>by User8</p>
				</div>
			</div>
        </main>
    <div class="footer">
		<div class="documentation">
			<a href="documentation/Documentation.html" class="Documentation">Documentation</a>
		</div>
	</div>
    </body>
</html>