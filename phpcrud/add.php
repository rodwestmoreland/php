<?php   session_start();
        require __DIR__.'/inc/head.php';
        require __DIR__.'/inc/pdo.php';
        require __DIR__.'/inc/checkLogin.php';

if ( isset($_POST['make'])  && isset($_POST['model'])
&&   isset($_POST['year'])  && isset($_POST['mileage'])) {

    if ( strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1) {
        $_SESSION['status'] = 'All values are required';
        header("Location: add.php");
        return;
    }

    if ( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ) {
        $_SESSION['status'] = 'Bad data';
        header("Location: add.php");
        return;
    }

        require __DIR__.'/inc/sqlAdd.php';    
        
        $_SESSION['status'] = 'Record added';
        header( 'Location: index.php' ) ;
        return;
}

// Flash pattern
require __DIR__.'/inc/sessionStatus.php';

?>
<p>Add A New Car</p>
<form method="post">
    <p>Make:    <input type="text" name="make"></p>
    <p>Model:   <input type="text" name="model"></p>
    <p>Year:    <input type="text" name="year"></p>
    <p>Mileage: <input type="text" name="mileage"></p>

    <p><input type="submit" value="Add New"/>
    <a href="index.php">Cancel</a></p>
</form>
</div>
</div>

</body>
</html>