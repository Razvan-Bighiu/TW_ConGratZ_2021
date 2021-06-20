<?php
    include '../includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query("SELECT * FROM businessbackground");
    $backgrounds = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($backgrounds as $background){
        echo "<a onclick=\"addBusinessBackground(".$background['id'].")\">";
        echo "<div class = \"pickerholder\">";
        echo "<img src=".$background['path'].">";
        echo "</div>";
        echo "</a>";
    }
?>