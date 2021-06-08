<?php
    include '../includes/galerie.inc.php';
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query("SELECT * FROM frames");
    $frames = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($frames as $frame){
        echo "<a onclick=\"changeFrame(".$frame['id'].")\">";
        echo "<div class = \"pickerholder\">";
        echo "<img src=".$frame['path'].">";
        echo "</div>";
        echo "</a>";
    }
?>