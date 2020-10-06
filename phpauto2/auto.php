<?php   include(__DIR__.'/inc/head.php');           include(__DIR__.'/inc/pdo.php'); 
        include(__DIR__.'/inc/accountCheck.php');   include(__DIR__.'/inc/delete.php');
        

        echo'<body>  <div class="container">  <div class="wrapper">';

$inserted   = "";

if ( isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) ) 
{
    if ( strlen($_POST['make']) <= 0  )                                 
        { $failure = "Make is required";}
    else 
    {    
        if (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ) 
            { $failure = "Mileage and year must be numeric"; }
        else 
        {
            $_SESSION['make'] =  $_POST['make'];
            $_SESSION['year'] =     $_POST['year'];
            $_SESSION['mileage'] =  $_POST['mileage'];
            header('Location: view.php');
            return;
        }
    }
}
echo('</tbody></table>');

?> <!-- View -------------------------------------------- -->

<div class="row second-row">
    <div class="col">               </div>
    <div class="col-12 col-md-9">
    <?php $failure ? print('<p style="color: red;">'.htmlentities($failure)."</p>\n") : null;  ?>
    <?php $inserted ? print('<p style="color: green;">'.htmlentities($inserted)."</p>\n") : null;  ?>
       <form method="POST">
    <div class="card style=">
        <div class="card-body">
        <h2 class="card-title text-white bg-primary" style="padding:10px;">Tracking Autos for <?php echo $_SESSION['account'] ?></h2>
        <div class="form-group-row">
            <label for="id_make" class="col-md-2 col-form-label">Make             </label>
            <div class="col-md-6">
                <input type="text" class="form-control"         name="make"      id="id_make">  
            </div>
            <div class="col-md-4"></div>
        </div>
        <br><br>
        <div class="form-group-row" >
            <label for="id_year" class="col-md-2 col-form-label">Year            </label>
            <div class="col-md-6">
                <input type="text" class="form-control"          name="year"    id="id_year"   placeholder="YYYY">
            </div>
            <div class="col-md-4"></div>
        </div>
        <br/><br>
        <div class="form-group-row" >

            <label for="id_miles" class="col-md-2 col-form-label">Mileage         </label>
            <div class="col-md-6">
                <input type="text" class="form-control"          name="mileage"    id="id_miles">
            </div>
            <div class="col-md-4"></div>
        </div>
        <br/><br>

        <div class="form-group-row">
            <div class="col-md-12">  
                <input class="btn btn-primary btn-width"      type="submit" value="Add">  
                <input class="btn btn-secondary btn-width"    type="submit" name= "cancel" value="Log Out">  
                <input class="btn btn-danger btn-width"       type="submit" name= "delete" value="Delete ALL">  
            </div>
        </div>
        </div></div>

    </form>
    </div>
</div>
<div class="hideButtons"> 
    <input type="submit" id="hide1" name="Add" value="Add">
    <input type="submit" name="delete" value="Delete">
    <input class="hideButtons" type="submit" name="logout" value="logout">
</div>
</body>
</html>