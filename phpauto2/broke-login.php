<?php include(__DIR__.'/inc/head.php');       include(__DIR__.'/inc/pdo.php');  

if ( isset($_POST['account']) && isset($_POST['pass']) ) 
{
    echo('first If POST account and pass are SET <br>');
    unset($_SESSION['account']); 
    {
    if ( strlen($_POST['account']) < 1 || strlen($_POST['pass']) < 1 ) 
      { $_SESSION['status'] = '<p style="color: red;">Email and password are required</p>';
        //header('Location: login.php');
        
      } else  {
            if(!filter_var($_POST['account'], FILTER_VALIDATE_EMAIL)) { // use built in email validate filter
             $login_status = "Email must have an at-sign (@)";  }
                else {
                    include(__DIR__.'/inc/checkHash.php');
                    
                    if ( $checkHashRow === FALSE ) {
                        echo "<h1>Incorrect password.</h1>\n";
                        
                        error_log("Login fail ".$_POST['account']." no HASH");
                        $_SESSION['error'] = "Incorrect password.";
                        header('Location: login.php');
                    } else { 
                        if ( $check == $stored_hash ) {
                            
                            $_SESSION['account'] = $_POST['account'];
                            $_SESSION['success'] = "Logged in.";
                            error_log("Login success ".$_POST['account']);
                            
                            header('Location: view.php');                            
                        }
                        // else {
                        //     echo "<h1>Incorrect password.</h1>\n";
                        //     error_log("Login fail ".$_POST['account']." $check");
                        // }                        
                        }
                }// after ELSE $login_status = $_POST['account'] . " :: Email must have an at-sign (@)";
            }// ELSE $login_status = "Email and password are required"
   }
} //main IF

?>

<body>
<div class="container">
    <div class="col-12 col-md-9">
    <?php 
        if(isset($_SESSION['status']))  
            {        
                echo($_SESSION['status']);
                //unset ($_SESSION['status']);     
            } else {
                echo "what the hell?".$_SESSION['status'];
            }
 
    ?>
    <form method="POST">
    <div class="card style=">
        <div class="card-body">
        <h2 class="card-title text-white bg-primary" style="padding:10px;">Auto Database Login</h2>
        <div class="form-group-row">
            <label for="nam" class="col-md-2 col-form-label">   Email          </label>
            <div class="col-md-6">
                <input type="text" class="form-control"         name="account"      id="nam">  
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
                <input class="btn btn-secondary btn-width" type="submit" name= "cancel" value="Cancel">  
            </div>
        </div>
        </div>
    </div>
        
    </form>
    </div>
</div>
</body>
