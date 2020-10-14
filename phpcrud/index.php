<?php   session_start();
        include(__DIR__.'/inc/sessionStatus.php');

If( !isset( $_SESSION['account'] ) ){
    //$_SESSION['status']='<p style="color: red;">Not logged in</p>';
    echo '
    <h2>Welcome to the Automobiles Database</h2>
    <p><a href="login.php">Please log in</a></p>
    ';
} else {
    require __DIR__.'/view.php';
}

?>

<a href="add.php">Add New</a>
