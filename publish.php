<?php
	session_start();
    include 'includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();
?>

<!DOCTYPE html>
<html lang=ro>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Creator.css">
        <link rel="stylesheet" href="css/footer.css">
        <title>Create a card!</title>
    </head>
    <body>
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
                    $curr_username=$_SESSION['username'];
                } else {
                    echo "<a href='signup.php' class='SignUp'>Sign up</a>";
                    echo "<a href='login.php' class='LogIn'>Log in</a>";
                    $curr_username="Anonymous";
                }
				?>
            </header>
        </div>
        <div class="center">
            <div class="mainFrame">
                <div id="cardImage" class="card" style="width:500px;height:500px;">
                <!-- <img id="cardImagine" src="">
                <div id="cardImage" class="card"></div> -->
                </div>
            </div>
            <div class="cardData">
                <form action="insert.php" method="POST">
                    Title:<br/> <input type="text" name="title" placeholder="Scrie un titlu" Required>
                    <br/>
                    Description: <br/>
                    <input type="text" name="description" placeholder="Scrie o descriere" Required>
                    
                    <input type="hidden" name="creator" value=<?php echo $curr_username?> >
                    
                    <input id="thumbnail" type='hidden' name='path'/>
                    <br/>
                    <input type="hidden" name="card" id="card">
                    <input type="submit" name="submit" value="Submit">
                </form>
                
                <!-- <form class="form-publish" method="POST" action="publish.php" enctype="multipart/form-data">
                    <input type="text" id="cTitle" name="cTitle" placeholder="Title"><br>
                    <textarea type="text" id="cDescription" name="cDescription" placeholder="Description"></textarea>
                    <input type="submit" name="upload">
                </form> -->
            </div>
        </div>
        <div class="footer">
            <div class="documentation">
                <a href="documentation/Documentation.html" class="Documentation">Documentation</a>
            </div>
        </div>
                
        <script>
            //document.getElementById("cardImage").src=sessionStorage.getItem('card');
            document.getElementById("card").setAttribute("value", sessionStorage.getItem('text-html'));
            document.getElementById("cardImage").innerHTML=sessionStorage.getItem('text-html');
            document.getElementById("thumbnail").setAttribute("value", sessionStorage.getItem("gCard"));

            //console.log(sessionStorage.getItem("gCard"));
        </script>
    </body>
</html>