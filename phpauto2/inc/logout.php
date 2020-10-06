<?php if (isset( $_POST['cancel'] ) ) {
        unset($_SESSION['account']); 
        unset($_POST['account']);
        unset($_POST['pass']);
        header('Location: index.php');
        return;
    }
?>