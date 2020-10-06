<?php 
if(isset($_POST['delete']))
{
    $sqlDelete = "DELETE FROM autos";
        $pdoDelete = $pdo->prepare($sqlDelete);
        $pdoDelete->execute(array(
        ':mk' => $_SESSION['make'],
        ':yr' => $_SESSION['year'],
        ':mi' => $_SESSION['mileage'])  );
        include(__DIR__.'/sqlQuery.php');
        $_SESSION['status'] = " Records removed";

        header('Location: view.php');
        return;
}

?>