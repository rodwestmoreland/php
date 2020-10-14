<?php  session_start();
        require __DIR__.'/inc/pdo.php';
        
if ( isset($_POST['delete']) && isset($_POST['auto_id']) ) {
    $sql = "DELETE FROM autos WHERE auto_id = :auto_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':auto_id' => $_POST['auto_id']));
    $_SESSION['status'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}

if ( ! isset($_GET['auto_id']) ) {
  $_SESSION['status'] = "Missing auto_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT make, year, auto_id FROM autos where auto_id = :auto_id");
$stmt->execute(array(":auto_id" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['status'] = 'Bad value for auto_id';
    header( 'Location: index.php' ) ;
    return;
}

?>
<p>Confirm: Deleting <?= htmlentities($row['year'])." ".htmlentities($row['make']) ?></p>

<form method="post">
<input type="hidden" name="auto_id" value="<?= $row['auto_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="index.php">Cancel</a>
</form>
