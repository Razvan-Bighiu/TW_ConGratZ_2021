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

    $insert = $pdo->query("INSERT INTO `images`(`title`, `description`, `creator`, `card`) VALUES ('$title','$description', '$creator', '$card')");

    if(!$insert)
    {
        echo "Error";
    }
    else
    {
        echo "Records added successfully.";
    }
}
?>