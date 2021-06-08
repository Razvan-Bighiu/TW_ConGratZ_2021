<?php

    include '../includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query("SELECT * FROM stickers");
    $stickers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($stickers as $sticker){
        echo "<a onclick=\"changeFrame(".$sticker['id'].")\">";
        echo "<div class = \"pickerholder\">";
        echo "<img src=".$sticker['path'].">";
        echo "</div>";
        echo "</a>";
    }
?>