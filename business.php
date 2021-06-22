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
                <div id="card" class="card" style="width:700px;height:400px;">
                     <!-- <img id="frame"/> -->
                    <!-- <canvas class="canvas" id="canvas"></canvas> -->
                    <canvas id="hiddenCanvas" style="display:none" width="700" height="400"></canvas>
                    <!-- <img src="https://cdn.shopify.com/s/files/1/0222/9834/products/shutterstock_754419700_1024x1024.jpg?v=1588706826" alt="This is where the card goes"/> -->
                </div>
            </div>
            
            <div class="picker" id="picker">
                
            </div>

            <div class="writer">
<<<<<<< Updated upstream
                <form action="addvcard.php" method="POST">
=======
                <form action="addbcard.php" method="POST">
>>>>>>> Stashed changes
                    <input id="nameField" type="text" name="name" placeholder="Name">
                    <input id="emailField" type="email" name="email" placeholder="Email">
                    <input id="telField" type="tel" name="phone" placeholder="Phone nr.">
                    <input id="addrField" type="text" name="adress" placeholder="Adress">
                    <input id="siteField" type="url" name="website" placeholder="Website">
                    <button id="generatebutton" class="PDF" type="button" onclick="placetext()">Generate</button>
<<<<<<< Updated upstream
                    <!-- <button class="IXML" type="button" name="Download">Import XML</button> -->
=======
>>>>>>> Stashed changes
                    <button class="PDF" type="button" name="Download" onclick="expPDF()">Export PDF</button>
                    <button class="QRC" type="button" name="Download" onclick="saveBCard()">Save</button>
                    <input class="IXML" type="file" id="file-input" />
                </form>
                <pre id="file-content"></pre>
            </div>
            
            </div>
        <!-- Main Frame-->
        <script type="text/javascript" src="js/bcreator.js"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
        <script>
        var expPDF = function() {
            saveCanvas();
            getImageFromUrl(bCard, createPDF);
        }

        var getImageFromUrl = function(url, callback) {
            var img = new Image();

            img.onError = function() {
                alert('Cannot load image: "' + url + '"');
            };
            img.onload = function() {
                callback(img);
            };
            img.src = url;
        }
        var createPDF = function(imgData) {
            var doc = new jsPDF();
            doc.addImage(imgData, 'JPEG', 10, 10, imgData.offsetWidth, imgData.offsetHeight, 'monkey');
            doc.save("bcard.pdf");
        }

        
        function readSingleFile(e) {
            var file = e.target.files[0];
            if (!file) {
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var contents = e.target.result;
                displayContents(contents);
            };
            reader.readAsText(file);
        }

        function displayContents(contents) {
            var element = document.getElementById('file-content');
            element.textContent = contents;
        }

        document.getElementById('file-input')
        .addEventListener('change', readSingleFile, false);

        function myFunction(xml) {
            var i;
            var xmlDoc = xml.responseXML;
            var table="<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
            var x = xmlDoc.getElementsByTagName("card");
            for (i = 0; i <x.length; i++) { 
                table += "<tr><td>" +
                    x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue +
                    "</td></td>" +
                    x[i].getElementsByTagName("phone")[0].childNodes[0].nodeValue +
                    "</td></tr>";
            }
            document.getElementById("demo").innerHTML = table;
        }
        </script>   
    </body>
</html>
