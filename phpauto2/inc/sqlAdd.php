<?php 
$sqlInsert = "INSERT INTO autos ( make, year, mileage) 
VALUES ( :mk, :yr, :mi)";
$pdoInsert = $pdo->prepare($sqlInsert);

$pdoInsert->execute(array(
':mk' => $_SESSION['make'],
':yr' => $_SESSION['year'],
':mi' => $_SESSION['mileage'])  );
$_SESSION['status'] = '<p style="color: green;">Record inserted</p>';

?>