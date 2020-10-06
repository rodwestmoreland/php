<?php 
if(isset($_POST['delete']))
{
    $sql = "DELETE FROM autos";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':mk' => $_POST['make'],
            ':yr' => $_POST['year'],
            ':mi' => $_POST['mileage'])  );
            $stmt = $pdo->query("SELECT year, make, mileage FROM autos");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $inserted = " Records removed";

}
?>