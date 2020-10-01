<?php include('pdo.php');

isset( $_POST['cancel'] ) ?  header("Location: index.php") : null;
 $failure  = "";  

if ( isset($_POST['who']) && isset($_POST['pass']) ) 
{
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) 
      { $failure = "Email and password are required";   } 
        else 
        {
            if(!filter_var($_POST['who'], FILTER_VALIDATE_EMAIL))  // use built in email validate filter
            {  $failure = "Email must have an at-sign (@)";  }
                else 
                {
                    $salt = 'XyZzy12*_';
                    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; //php123
                     $check = hash('md5', $salt.$_POST['pass']);
                     
                        $sql = "SELECT email FROM users 
                        WHERE email = :em AND password = :pw";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(array(
                            ':em' => $_POST['who'], 
                            ':pw' => $_POST['pass']));
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                        //var_dump($row);
                        if ( $row === FALSE ) {
                            echo "<h1>Incorrect password.</h1>\n";
                            error_log("Login fail ".$_POST['who']." no HASH");
                        } else { 
                            if ( $check == $stored_hash ) 
                            {
                                session_start();
                                $_SESSION['email'] = $_POST['who'];
                                error_log("Login success ".$_POST['who']);
                                header("Location: auto.php?name=".urlencode($_POST['who'])); exit;
                                
                            }
                            // else {
                            //     echo "<h1>Incorrect password.</h1>\n";
                            //     error_log("Login fail ".$_POST['who']." $check");
                            // }
                            
                        }
                }// after ELSE $failure = $_POST['who'] . " :: Email must have an at-sign (@)";
            }// ELSE $failure = "Email and password are required"
} //main IF


?>

<!DOCTYPE html>
<?php  include('header.php') ?>

<body>
<div class="container">
    <div class="col-12 col-md-9">
    <?php $failure ? print('<p style="color: red;">'.htmlentities($failure)."</p>\n") : null;  ?>
    <form method="POST">
    <div class="card style=">
        <div class="card-body">
        <h2 class="card-title text-white bg-primary" style="padding:10px;">Auto Database Login</h2>
        <div class="form-group-row">
            <label for="nam" class="col-md-2 col-form-label">   Email          </label>
            <div class="col-md-6">
                <input type="text" class="form-control"         name="who"      id="nam">  
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
                <input class="btn btn-primary"      type="submit" value="Log In">  
                <input class="btn btn-secondary"    type="submit" name= "cancel" value="Cancel">  
            </div>
        </div>
        </div></div>
        <input type="submit" name="Add" value="Add">
    </form>
    </div>
</div>
</body>
