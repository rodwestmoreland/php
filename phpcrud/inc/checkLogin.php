<?php 

If( !isset( $_SESSION['account'] ) ){
    $_SESSION['status']='<p style="color: red;">Not logged in</p>';
    header('Location: index.php');
    return;
} 

?>