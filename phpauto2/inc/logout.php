<?php if (isset( $_POST['cancel'] ) ) {
        unset($_SESSION['account']); 
        unset($_POST['account']);
        unset($_POST['pass']);
        unset($_SESSION['make']);
        unset($_SESSION['year']);
        unset($_SESSION['mileage']);
        header('Location: index.php');
        return;
    }
?>