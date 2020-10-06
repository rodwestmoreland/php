<?php   include(__DIR__.'/inc/head.php'); 
        include(__DIR__.'/inc/accountCheck.php'); 
        include(__DIR__.'/inc/logout.php');
        if (isset( $_POST['add'] ) ) {
            header('Location: add.php');
            return;
        }
        
        $inserted = "";
?>

<body>
<div class="container">
    <div class="col-12 col-md-9">
    <?php include(__DIR__.'/inc/sessionStatus.php'); empty($_SESSION['status']) ? "" : $_SESSION['status'];   ?>
    <form method="POST">
    <div class="card style=">
        <div class="card-body">
        <h2 class="card-title text-white bg-primary" style="padding:10px;">Auto Tracking for <?php echo $account ?></h2>        
            <h4 style="padding:2em 0em 2em 1em;"> Click the Add button to add a vehicle, or Cancel to log out.</h4>
        <div class="form-group-row">
            <div class="col-md-12">  
                <input class="btn btn-primary btn-width"    type="submit" name= "add"    value="Add New">  
                <input class="btn btn-secondary btn-width"  type="submit" name= "logout" value="Logout">  
            </div>
        </div>
        </div>
        <div class="hideButtons"> 
            <a href="add.php">Add New</a>
            <a href="login.php">Logout</a>
        </div>
    </div>
        
    </form>
    
    <?php   include(__DIR__.'/inc/pdo.php');
            include(__DIR__.'/inc/sqlQuery.php'); 
                echo('<table class="table"><tbody><tr></tr></tbody></table>');
                echo('<table class="table"><tbody>');
            include(__DIR__.'/inc/printRows.php');
            echo('</tbody></table>');
    ?>
</div>
</body></html>