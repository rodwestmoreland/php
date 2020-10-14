<?php   session_start();
        require(__DIR__.'/inc/head.php');
        

    echo '<h2>Welcome to the Automobiles Database</h2>';

If( !isset( $_SESSION['account'] ) ){
    include(__DIR__.'/inc/sessionStatus.php');
    echo '
    
    <p><a href="login.php">Please log in</a></p>
    <p>Attempt to <a href="add.php">add data</a> without logging in</p>
    ';
} else {
    include(__DIR__.'/inc/sessionStatus.php');
    
    echo '
    <body>
    <div class="container">
    <div class="col-12 col-md-9">';
    echo '
    <table class="table"><tbody>';

    require __DIR__.'/view.php';

    echo '
    </tbody></table>
    </div>
    </div>
    
    </body>
    </html>' ;
}

?>


