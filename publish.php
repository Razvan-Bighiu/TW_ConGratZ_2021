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
                <form method="POST" action="publish.php" enctype="multipart/form-data">
                    <input type="text" id="cTitle" name="cTitle" placeholder="Title"><br>
                    <textarea type="text" id="cDescription" name="cDescription" placeholder="Description"></textarea>
                    <input type="submit" name="upload">
                </form>
                
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

            <?php
            $msg = "";
  
            include '../includes/galerie.inc.php';
            $pdo = pdo_connect_mysql();
            $id = $pdo->lastInsertId();
            $id++;
            $username = $_SESSION['username'];
            // If upload button is clicked ...
            if (isset($_POST['upload'])) {
            
                // $filename = $_FILES["uploadfile"]["name"];
                // $tempname = $_FILES["uploadfile"]["tmp_name"];   
                $folder = "images/".$id.".jpg";
                $title = $_POST["cTitle"];
                $description = $_POST["cDescription"];
                $date = date("YYYY-MM-DD HH:MM:DD");

                    // Get all the submitted data from the form
                    $stmt = $pdo->prepare(
                        "INSERT INTO images('title','description','path','date','creator') VALUES 
                    (NULL,?,?,CURRENT_TIMESTAMP,?)");
                    
                    //$stmt->bindValue("id",$id,PDO::PARAM_INT);
                    $stmt->bindValue("title",$title,PDO::PARAM_STR);
                    $stmt->bindValue("description",$description,PDO::PARAM_STR);
                    $stmt->bindValue("path",$folder,PDO::PARAM_STR);
                    //$stmt->bindValue("date",$date,PDO::PARAM_STR);
                    $stmt->bindValue("creator",$username,PDO::PARAM_STR);
                

                    // Execute query
                    $stmt->execute();
                    
                    // Now let's move the uploaded image into the folder: images
                    if (move_uploaded_file($id.".jpg", $folder))  {
                        $msg = "Image uploaded successfully";
                    }else{
                        $msg = "Failed to upload image";
                }
            }
            ?>



    </body>
</html>