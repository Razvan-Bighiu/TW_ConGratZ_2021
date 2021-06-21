<?php
	session_start();
    include 'includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();

if(isset($_POST['submit']))
{		
    // $path = $_POST['path'];
    $xml = $_POST['xml'];
    $card = $_POST['card'];

    $insert = $pdo->query("INSERT INTO `businesscards`(`xml`, `card`) VALUES ('$xml', '$card')");

    if(!$insert)
    {
        echo "Error";
    }
    else
    {
        header("Location: index.php");
    }
}
?>