<?php
$pdoExecute->execute(array(
    ':mk' => $_SESSION['make'],
    ':yr' => $_SESSION['year'],
    ':mi' => $_SESSION['mileage'])  );
?>