<?php
if(isset($_SESSION['make'])){
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
// else {
//     echo "ROWS not set";
//}

?>