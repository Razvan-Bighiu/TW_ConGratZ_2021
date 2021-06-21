<?php
	session_start();
    include 'includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();

if(isset($_POST['submit']))
{		
    $title = $_POST['title'];
    $description = $_POST['description'];
    $creator = $_POST['creator'];
    $card = $_POST['card'];
    $path = $_POST['path'];

    $insert = $pdo->query("INSERT INTO `images`(`title`, `description`, `creator`, `card`, `path`) VALUES ('$title','$description', '$creator', '$card', '$path')");

    if(!$insert)
    {
        echo "Error";
    }
    else
    {
        header("Location: index.php");
        //echo($path);
    }
}
?>