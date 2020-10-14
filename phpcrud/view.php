<?php
        require __DIR__.'/inc/pdo.php';
$val =  "ok";
echo('<table border="1">'."\n");
$stmt = $pdo->query("SELECT make, model, year, mileage, auto_id FROM autos");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "
    <tr>
        <td>".htmlentities($row['make'])."      </td>
        <td>".htmlentities($row['model'])."     </td>
        <td>".htmlentities($row['year'])."      </td>
        <td>".htmlentities($row['mileage'])."   </td>
        <td>".htmlentities($row['auto_id'])."   </td>";
    
echo'
        <td><a href="edit.php?auto_id='.$row['auto_id'].'">     Edit</a> / 
            <a href="delete.php?auto_id='.$row['auto_id'].'">   Delete</a></td>';

    echo "</tr> \n";
    
}

echo '</table>';

?>
