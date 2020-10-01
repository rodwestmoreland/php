<?php include('header.php'); include('pdo.php'); session_start();
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}
        echo'
        <body>
        <div class="container">
            <div class="wrapper">
        ';

isset( $_POST['cancel'] ) ?  header("Location: index.php") : null;

$email      = $_SESSION['email'] ;
$failure    = "";
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
            $sql = "INSERT INTO autos ( make, year, mileage) 
                        VALUES ( :mk, :yr, :mi)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':mk' => $_POST['make'],
            ':yr' => $_POST['year'],
            ':mi' => $_POST['mileage'])  );
            $stmt = $pdo->query("SELECT year, make, mileage FROM autos ORDER BY make");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $inserted = " Record inserted";

            echo('<table class="table"><tbody><tr></tr></tbody></table>');
            echo('<table class="table"><tbody>');
            foreach ( $rows as $row ) 
            {
                echo'
                <tr>
                <td>'.$row['year'].'</td>
                <td><a href="https://www.bing.com/images/search?q='.$row['year'].'+'.$row['make'].'+car+truck+suv" target="_blank">   
                            <b><u>'.$row['make'].'</b></u></a></td>
                <td>'.$row['mileage'].'</td>
                </tr>';
            }
        }
    }
}
if(isset($_POST['delete']))
{
    $sql = "DELETE FROM autos";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':mk' => $_POST['make'],
            ':yr' => $_POST['year'],
            ':mi' => $_POST['mileage'])  );
            $stmt = $pdo->query("SELECT year, make, mileage FROM autos");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $inserted = " Records removed";

}
echo('</tbody></table>');
?>

<div class="row second-row">
    <div class="col">               </div>
    <div class="col-12 col-md-9">
    <?php $failure ? print('<p style="color: red;">'.htmlentities($failure)."</p>\n") : null;  ?>
    <?php $inserted ? print('<p style="color: green;">'.htmlentities($inserted)."</p>\n") : null;  ?>
       <form method="POST">
    <div class="card style=">
        <div class="card-body">
        <h2 class="card-title text-white bg-primary" style="padding:10px;">Tracking Autos for <?php echo $email ?></h2>
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
                <input class="btn btn-primary"      type="submit" value="Add">  
                <input class="btn btn-secondary"    type="submit" name= "cancel" value="Log Out">  
            </div>
        </div>
        </div></div>
        <input type="submit" name="Add" value="Add">
        <input type="submit" name="delete" value="delete">
    </form>
    </div>
</div>
</body>
</html>