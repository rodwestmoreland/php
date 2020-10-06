<?php 
if(isset($_POST['delete']))
{
    $sql = "DELETE FROM autos";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':mk' => $_SESSION['make'],
            ':yr' => $_SESSION['year'],
            ':mi' => $_SESSION['mileage'])  );
            $stmt = $pdo->query("SELECT year, make, mileage FROM autos");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $inserted = " Records removed";

}
?>