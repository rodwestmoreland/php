<?php   session_start();
        require __DIR__.'/inc/pdo.php';

if ( isset($_POST['make'])  && isset($_POST['model'])
&&   isset($_POST['year'])  && isset($_POST['mileage'])) {

    if ( strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1) {
        $_SESSION['status'] = 'Missing data';
        header("Location: edit.php");
        return;
    }

    if ( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ) {
        $_SESSION['status'] = 'Bad data';
        header("Location: edit.php");
        return;
    }

    $sql = "UPDATE autos SET 
                make = :make,  model =   :model, 
                year = :year,  mileage = :mileage
            WHERE auto_id = :auto_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':make' =>      $_POST['make'],
            ':model' =>     $_POST['model'],
            ':mileage' =>   $_POST['mileage'],
            ':year' =>      $_POST['year']));

            $_SESSION['status'] = 'Record Added';
            header( 'Location: index.php' ) ;
            return;
}

if ( ! isset($_GET['auto_id']) ) {
  $_SESSION['status'] = "Missing auto_id";
  echo "no auto id";
    header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM autos where auto_id = :auto_id");
$stmt->execute(array(":auto_id" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['status'] = 'Bad value for auto_id';
    echo "bad value = ".$_GET['auto_id'];
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
require __DIR__.'/inc/sessionStatus.php';

$make =     htmlentities($row['make']);
$model =    htmlentities($row['model']);
$year =     htmlentities($row['year']);
$mileage =  htmlentities($row['mileage']);
$auto_id =  $row['auto_id'];
?>

<p>Edit Auto</p>
<form method="post">

    <p>Make:    <input type="text" name="make"     value="<?= $make ?>"> </p>
    <p>Model:   <input type="text" name="model"    value="<?= $model ?>"></p>
    <p>Year:    <input type="text" name="year"     value="<?= $year ?>"></p>
    <p>Mileage: <input type="text" name="mileage"  value="<?= $mileage ?>"></p>

                <input type="hidden" name="auto_id" value="<?= $auto_id ?>">
<p>
    <input type="submit"                value="Update"/>
    
    <a href="index.php">                        Cancel</a>
</p>
</form>
