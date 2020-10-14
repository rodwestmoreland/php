<?php   session_start(); 
        require(__DIR__.'/inc/pdo.php');  
    
if ( isset($_POST['email']) && isset($_POST['pass']) ) 
{   
    if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
      {$_SESSION['status'] = "Email must have an at-sign (@)"; }
        else  {
            include(__DIR__.'/inc/checkHash.php');
                
            if ( $checkHashRow === FALSE ) {            
                
                $_SESSION['status'] = '<p style="color: red;">Incorrect password.</p>';
                header('Location: login.php');
                return;
            } else {
                if ( $check == $stored_hash ) {
                $_SESSION['account'] = $_POST['email']; 
                $_SESSION['status'] = '<p style="color: green;">Login accepted</p>';
                header('Location: index.php');
                return;
                } else {
                    $_SESSION['status'] = '<p style="color: red;">Email and password are required</p>';
                    header('Location: login.php');
                    return;
                    }
                } 
        }
}

?>

<body>
<div class="container">
    <div class="col-12 col-md-9">
    <?php  include(__DIR__.'/inc/sessionStatus.php');    ?>
    <form method="POST">
    <div class="card style=">
        <div class="card-body">
        <h2 class="card-title text-white bg-primary" style="padding:10px;">Auto Database Login</h2>
        <div class="form-group-row">
            <label for="nam" class="col-md-2 col-form-label">   Email          </label>
            <div class="col-md-6">
                <input type="text" class="form-control"         name="email"      id="nam">  
            </div>
            <div class="col-md-4"></div>
        </div>
        <br><br>
        <div class="form-group-row" >
            <label for="id_1723" class="col-md-2 col-form-label">Password       </label>
            <div class="col-md-6">
                <input type="text" class="form-control"          name="pass"    id="id_1723">
            </div>
            <div class="col-md-4"></div>
        </div>
        <br/><br>
        <div class="form-group-row">
            <div class="col-md-12">  
            <br/><br>
                <input class="btn btn-primary btn-width"   type="submit" value="Log In">  
                <input class="btn btn-secondary btn-width" type="submit" name= "logout" value="cancel">  
            </div>
        </div>
        </div>
    </div>
        
    </form>
    </div>
</div>
</body>
