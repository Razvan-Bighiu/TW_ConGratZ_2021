<?php
	session_start();
    include '../includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();


    // $path = $_POST['path'];
    $xml = $_POST['xml'];
    $card = $_POST['card'];

//    $insert = $pdo->query("INSERT INTO `businesscards` (`xml`, `card`) VALUES ('$xml', '$card')");
    $data = [
        'xml' => $xml,
        'card' => $card,
    ];
    $sql = "INSERT INTO businesscards (xml,card) VALUES (:xml, :card)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    
    $stmt = $pdo->query("SELECT LAST_INSERT_ID()");
    $lastId = $stmt->fetchColumn();

    header("Location: bcardviewer.php?id=".$lastId);
?>