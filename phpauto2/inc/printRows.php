<?php
        foreach ( $rows as $row ) 
        {
            echo'
            <tr>
            <td>'.$row['year'].'</td>
            <td><a href="https://www.bing.com/images/search?q='.$row['year'].'+'.$row['make'].'+car+truck+suv" target="_blank">   
                        <u>'.htmlentities($row['make']).'</u></a></td>
            <td>'.$row['mileage'].'</td>
            </tr>';

        }
      

    
?>