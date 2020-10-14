<?php   session_start();
        include(__DIR__.'/inc/sessionStatus.php');

    echo '<h2>Welcome to the Automobiles Database</h2>';

If( !isset( $_SESSION['account'] ) ){
    //$_SESSION['status']='<p style="color: red;">Not logged in</p>';
    echo '
    
    <p><a href="login.php">Please log in</a></p>
    <p>Attempt to <a href="add.php">add data</a> without logging in</p>
    ';
} else {
    require __DIR__.'/view.php';
}

?>


