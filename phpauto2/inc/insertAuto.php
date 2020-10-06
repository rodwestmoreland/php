<?php 
if(isset($_SESSION['make'])){
$sql = "INSERT INTO autos ( make, year, mileage) 
VALUES ( :mk, :yr, :mi)";

$stmt = $pdo->prepare($sql);
// *** TEST change POST to SESSION
$stmt->execute(array(
':mk' => $_SESSION['make'],
':yr' => $_SESSION['year'],
':mi' => $_SESSION['mileage'])  );
$stmt = $pdo->query("SELECT year, make, mileage FROM autos ORDER BY make");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$inserted = " Record inserted";
} 
// else {
//     echo "Not set yet";
// }

?>