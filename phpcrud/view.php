<?php
        require __DIR__.'/inc/pdo.php';

   echo '
   
   <table class="table">'."<tbody>
   <tr>
        <td>Make        </td>
        <td>Model       </td>
        <td>Year        </td>
        <td>Mileage     </td>
        <td>Action      </td>
   </tr>";

$stmt = $pdo->query("SELECT make, model, year, mileage, auto_id FROM autos");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "
    <tr>
        <td>".htmlentities($row['make'])."      </td>
        <td>".htmlentities($row['model'])."     </td>
        <td>".htmlentities($row['year'])."      </td>
        <td>".htmlentities($row['mileage'])."   </td>";
    
    echo'
        <td><a href="edit.php?auto_id='.$row['auto_id'].'">     Edit</a> / 
            <a href="delete.php?auto_id='.$row['auto_id'].'">   Delete</a></td>';

    echo "</tr> \n";
    
}

echo '</table>
<br>
<p><a href="add.php">Add New Entry</a></p>
<p><a href="logout.php">Logout</a></p>';

?>
