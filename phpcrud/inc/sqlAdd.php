<?php 

$sql = "INSERT INTO autos   (make,   model,  year,   mileage)
                   VALUES  (:make,  :model, :year,  :mileage)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':make' =>      $_POST['make'],
':model' =>     $_POST['model'],
':mileage' =>   $_POST['mileage'],
':year' =>      $_POST['year']));


?>