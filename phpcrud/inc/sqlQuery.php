<?php
$pdoQuery = $pdo->query("SELECT year, make, mileage FROM autos ORDER BY make");
$rows = $pdoQuery->fetchAll(PDO::FETCH_ASSOC);
?>